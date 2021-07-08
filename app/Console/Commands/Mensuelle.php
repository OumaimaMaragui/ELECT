<?php

namespace App\Console\Commands;

use App\Models\Mensualite;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Mensuelle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mensualite:suggest';

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
          $id = $user[$j]->id;  
        $consommation = DB::table('consommations')
        ->select('user_id', DB::raw('AVG(consommation) as moyenne'))
        ->where('user_id',$id)
        ->groupBy('user_id')
        ->get();
        if($consommation != '[]'){
            $consommation = $consommation[0]->moyenne;}
         else{
                $consommation =0;
            }
            $mensualite = Mensualite::where('user_id',$id)->get();   
    
            if($mensualite != '[]'){
                $mensualite = $mensualite[0]->montant;}
             else{
                    $mensualite =0;
                }
            $conso = $consommation + $mensualite;
            if($conso < 101){
            $prix = 0.9010;
        }
        elseif($conso >= 101 && $conso<151){
            $prix = 1.0732;
        }elseif($conso >= 151 && $conso<201){
            $prix =1.0732;
        }elseif($conso >= 201 && $conso < 301){
            $prix = 1.1676;
        }elseif($conso >=301 && $conso < 501){
            $prix = 1.3817;	            
        }else{
            $prix = 1.5958;
        }

        $suggestion =(int)($conso * $prix) + 1 ;
        
        $update = DB::table('mensualites')
        ->where('user_id', $id)
        ->update(['suggestion' => $suggestion]);
    }

    }
}
