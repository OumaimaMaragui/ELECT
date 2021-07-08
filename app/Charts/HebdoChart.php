<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HebdoChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
      $user = Auth::user();
      $month = Carbon::now()->month;
      $year = Carbon::now()->year;
      $day = Carbon::now()->day-1;
    

      $month = str_pad(strval($month), 2, '0', STR_PAD_LEFT);        
      $day = str_pad(strval($day), 2, '0', STR_PAD_LEFT);  


          $t[] = [];
          $totale = [];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
          $consommation =  DB::table('consommations')
          ->select("date", "consommation")
          ->where('user_id',$user->id)
          ->where('date','like',$year.'-'.$month.'-'.$day)
          ->get(); 
          for($i=0;$i<5;$i++ ){
              $n = sizeof($consommation);
              $somme = 0;
              for($i=0;$i<$n;$i++){
                  $somme = $somme + $consommation[$i]->consommation ;
              }

              $totale =Arr::add($totale,$month.'-'.$year,$somme );
              $month = $month - 1 ;
              if($month == 0){
                $year = $year - 1 ;
                $month = 12 ;
              }
    
              $consommation =  DB::table('consommations')
              ->select("date", "consommation")
              ->where('user_id',$user->id)
              ->where('date','like',$year.'-'.$month.'%')
              ->get(); 
        
          }  

          ksort($totale);
          [$keys, $values] = Arr::divide($totale);
           
          return Chartisan::build()
            ->labels($keys)
            ->dataset('Consommation',$values);
    }
}