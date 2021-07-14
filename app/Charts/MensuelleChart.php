<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MensuelleChart extends BaseChart
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
    


      $month = str_pad(strval($month), 2, '0', STR_PAD_LEFT);        
      $year = Carbon::now()->year;

          $t[] = [];
          $totale = [];
          $moyenne = 0;
          for($j=0;$j<5;$j++){
            $consommation =  DB::table('consommations')
            ->select("date", "consommation")
            ->where('user_id',$user->id)
            ->where('date','like',$year.'-'.$month.'%')
            ->get(); 
  
              $n = sizeof($consommation);
              $somme = 0;
              for($i=0;$i<$n;$i++){
                  $somme = $somme + $consommation[$i]->consommation ;
              }
              $moyenne = $moyenne + $somme;
              $day = 05;
              $myDate = "$year/$month/$day" ;
              $date = Carbon::createFromFormat('Y/m/d', $myDate);
              $monthName = $date->format('F'); 
              $totale =Arr::add($totale,"$monthName",$somme );
              $month = $month - 1 ;
              if($month == 0){
                $year = $year - 1 ;
                $month = 12 ;
              }
              $month = str_pad(strval($month), 2, '0', STR_PAD_LEFT);        
              }  

              [$keys, $values] = Arr::divide($totale);
              $n = sizeof($totale);
              $inkeys[] = [];
              $invalues[] = [];
              for($k=0;$k<$n;$k++){
                  $inkeys[$k]= $keys[$n-$k-1];
                  $invalues[$k]= $values[$n-$k-1];
              }
              $moyenne = $moyenne /5;

          return Chartisan::build()
            ->labels($inkeys)
            ->dataset('Consommation',$invalues)
            ->dataset('Moyenne',[$moyenne,$moyenne,$moyenne,$moyenne,$moyenne]);
    }
}