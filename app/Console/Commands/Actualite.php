<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Consommation;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Actualite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actualite:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Auth $auth)
    {
// PARTIE 1 : Comparaison de la consommation d'hier avec celle d'avant hier ( en baisse, en hausse ou stable)
      
      $user = User::all();
      $u = sizeof($user);
      for($j=0;$j<$u;$j++){
        $uu = $user[$j]->id;
             // le schedular execute ce code à 00:00 chaque jour
        // date est donc 00:00  YYYY-mm-dd 
        $date= Carbon::now();
        // la date d'hier

        $date1 = $date->addDays(-1)->format('Y-m-d');

        // la date d'avant hier
        $date2 = $date->addDays(-1)->format('Y-m-d');
        //consommation d'hier 
        $consommation1 = DB::table('consommations')
        ->select('date', DB::raw('SUM(consommation) as totale'))
        ->where('user_id',$uu)
        ->where('date',"$date1")
        ->groupBy('date')
        ->get();    

        if($consommation1  != '[]') {
          $consommation1 = $consommation1[0]->totale;

      }else{        
          $consommation1 = 0;

      }
      



        //consommation d'avant hier
        $consommation2 = DB::table('consommations')
        ->select('date', DB::raw('SUM(consommation) as totale'))
        ->where('user_id',$uu)
        ->where('date',"$date2")
        ->groupBy('date')
        ->get(); 
        if($consommation2  != '[]') { 
           $consommation2 = $consommation2[0]->totale;

      }else{       
          $consommation2 = 0;

      }
        //Comparer la consommation d'hier avec celle d'avant hier
       if($consommation1 > $consommation2){
        $noti = new Notification();
        $noti->user_id = $uu;
        $noti->type = 'alerte';
        $noti->texte = 'Votre consommation le '.$date1.' dépasse celle du '.$date2." d'environ ".($consommation1-$consommation2) .". Essayez d'etre plus economique!";
        $noti->date = Carbon::now()->format('Y-m-d');
        $noti->save();
     }elseif($consommation1 < $consommation2){
      $noti = new Notification();
      $noti->user_id = $uu;
      $noti->type = 'notification';
      $noti->texte = 'Votre consommation le '.$date1.' est inférieure à celle du  '.$date2." d'environ ".($consommation2-$consommation1) ." Félicitations ! Votre économie protège l'environnement";
      $noti->date = Carbon::now()->format('Y-m-d');
      $noti->save();
    }else{
      $noti = new Notification();
      $noti->user_id = $uu;
      $noti->type = 'notification';
      $noti->texte = 'Votre consommation le '.$date1.' est stable par rapport à celle du  '.$date2;
      $noti->date = Carbon::now()->format('Y-m-d');
      $noti->save();

    }


 
        // PARTIE 2 : Comparaison de la consommation quotidienne avec la consommation moyenne
  
  
        $date= Carbon::now();
        $date = $date->addDays(-1)->format('Y-m-d');
  
        //consommation d'hier
        $consommation = DB::table('consommations')
          ->select('date', DB::raw('SUM(consommation) as totale'))
          ->where('user_id',$uu)
          ->where('date',$date)
          ->groupBy('date')
          ->get(); 
          if($consommation  != '[]') { 
              $consommation = $consommation[0]->totale;
   
         }else{       
             $consommation = 0;
   
         }
   
  
        // Consommation des jours précedents pour faire la moyenne
          $consommations = DB::table('consommations')
          ->select('date', DB::raw('SUM(consommation) as totale'))
          ->where('user_id',$uu)
          ->where('date','<>',$date)
          ->groupBy('date')
          ->orderBy('date','desc')
          ->take(15)
          ->get();
  
          // calcul de la moyenne avec consition si vecteur nul ou pas
          if($consommations  != '[]') { 
              $somme =0;
              $n = sizeof($consommations);
              for($i=0;$i<$n;$i++){
                $somme = $somme +$consommations[$i]->totale;
              }
              $moyenne = $somme / $n;
       
         }else{       
             $moyenne = 0;
   
         }

          //calcule de la moyenne
  
          //comparaison de la consommation moyenne avec la consommation d'hier
          if($moyenne < $consommation){
            $noti = new Notification();
            $noti->user_id = $uu;
            $noti->type = 'alerte';
            $noti->texte = "La consommation d'hier ".$date." est ".$consommation." . Elle dépasse la consommation moyenne . Essayer d'etre plus economique!";
            $noti->date = Carbon::now()->format('Y-m-d');
            $noti->save();
          
          }elseif($moyenne > $consommation){
            $noti = new Notification();
            $noti->user_id = $uu;
            $noti->type = 'notification';
            $noti->texte = "La consommation d'hier ".$date." est inférieure à la consommation moyenne  Félicitations ! Votre économie protège l'environnement";
            $noti->date = Carbon::now()->format('Y-m-d');
            $noti->save();
          
          }else{
            $noti = new Notification();
            $noti->user_id = $uu;
            $noti->type = 'notification';
            $noti->texte = "La consommation d'hier ".$date.' est stable par rapport à la consommation  moyenne';
            $noti->date = Carbon::now()->format('Y-m-d');
            $noti->save();
          }
      }
  
}

}
