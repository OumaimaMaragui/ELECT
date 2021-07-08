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


class QuotidienChart extends BaseChart
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
      $day = Carbon::now()->day;
      $month = str_pad(strval($month), 2, '0', STR_PAD_LEFT);        
      $day = str_pad(strval($day), 2, '0', STR_PAD_LEFT);        

          $t[] = [];
          $totale = [];
          $moyenne = 0;
          for($i=0;$i<5;$i++){
            $consommation =  DB::table('consommations')
            ->select("date", "consommation")
            ->where('user_id',$user->id)
            ->where('date','like',$year.'-'.$month.'-'.$day)
            ->get();
            $n = sizeof($consommation);
            $somme = 0;
            for ($j=0;$j<$n;$j++){
                $somme = $somme + $consommation[$j]->consommation;
            }
            $moyenne = $moyenne + $somme;
            $totale =Arr::add($totale,$year.'-'.$month.'-'.$day,$somme );
            $day = $day -1;
              $day = str_pad(strval($day), 2, '0', STR_PAD_LEFT);  

              if($day == 0){
                $month = $month-1;
                $month = str_pad(strval($month), 2, '0', STR_PAD_LEFT);        

                if($month == 0){
                  $year = $year - 1 ;
                  $month = 12 ;
                }   
                $date = "$year/$month/$day" ;
                $date = Carbon::parse($date); 
                $day= Carbon::parse($date->format('Y-m-d'))->daysInMonth ;
                }
                $date = "$year/$month/$day" ;
          }  
          $moyenne = $moyenne /5;
          ksort($totale);
          [$keys, $values] = Arr::divide($totale);

        return Chartisan::build()
            ->labels($keys)
            ->dataset('Consommation',$values)
            ->dataset('Moyenne',[$moyenne,$moyenne,$moyenne,$moyenne,$moyenne]);

    }
}