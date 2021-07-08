<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Tranche extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Tranche:detect';

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
    public function handle()
    {
        $user = User::all();
        $u = sizeof($user);
        for($j=0;$j<$u;$j++){
          $uu = $user[$j]->id;
               // le schedular execute ce code à 00:00 chaque mois
          // date est donc 00:00  YYYY-mm-dd 
      // le schedular execute ce code à 00:00 chaque mois
 // date est donc 00:00  YYYY-mm-dd 
            $date= Carbon::now();
            // date mois i-1
            $date1 = $date->addDays(-1)->format('Y-m');
           
            // date mois i-2
            $date2= Carbon::now()->addMonths(-1)->format('Y-m');

            // consommation mois i-1
            $consommation = DB::table('consommations')
            ->select('date', DB::raw('SUM(consommation) as totale'))
            ->where('user_id',$uu)
            ->where('date','like',$date1.'%')
            ->groupBy('date')
            ->get();    
            if($consommation != '[]'){
            $consommation = $consommation[0]->totale;}
            else{
                $consommation =0;
            }

            if($consommation < 101){
            $tranche = 1;
            }
            elseif($consommation >= 101 && $consommation<151){
            $tranche = 2;
            }elseif($consommation >= 151 && $consommation<201){
            $tranche=3;
            }elseif($consommation >= 201 && $consommation < 301){
            $tranche = 4;
            }elseif($consommation >=301 && $consommation < 501){
            $tranche = 5;           
            }else{
            $tranche = 6;
            }
            // consommation mois i-2

            $consommation2 = DB::table('consommations')
            ->select('date', DB::raw('SUM(consommation) as totale'))
            ->where('user_id',$uu)
            ->where('date','like',$date2.'%')
            ->groupBy('date')
            ->get();    
            if($consommation2 != '[]'){
            $consommation2 = $consommation2[0]->totale;}
            else{
                $consommation2 =0;
            }

            if($consommation2 < 101){
            $tranche2 = 1;
            }
            elseif($consommation2 >= 101 && $consommation2<151){
            $tranche2 = 2;
            }elseif($consommation2 >= 151 && $consommation2<201){
            $tranche2=3;
            }elseif($consommation2 >= 201 && $consommation2 < 301){
            $tranche2 = 4;
            }elseif($consommation2 >=301 && $consommation2 < 501){
            $tranche2 = 5;           
            }else{
            $tranche2 = 6;
            }

            if($tranche > $tranche2){
            $message = "Attention vous n'etes plus en tranche $tranche2 . Vous etes en tranche $tranche .";
            $type = "alerte";
            }elseif($tranche < $tranche2){
            $message = "Felicitation ! Vous etes maintenant en tranche $tranche au lien de $tranche2 .";
            $type = "notification";
            }else{
            $message = " Votre consommation est stable, Vous etes toujous en tranche $tranche2 ";
            $type = "notification";

            }
            $noti = new Notification();
            $noti->user_id = $uu;
            $noti->type = $type;
            $noti->texte = $message;
            $noti->date = Carbon::now()->format('Y-m-d H:i:s');
            $noti->save();

        }
    }
  }
