<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Annuelle;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnnuelleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
      $user = Auth::user();
      $year = Carbon::now()->year;
          $year = 2021 ;
          $t[] = [];
          $totale = [];
          $moyenne = 0;
          for($j=0;$j<5;$j++){
            $consommation =  DB::table('consommations')
            ->select("date", "consommation")
            ->where('user_id',$user->id)
            ->where('date','like',$year.'%')
            ->get();
  
          $n = sizeof($consommation);
          $somme = 0;
          for($i=0;$i<$n;$i++){
              $somme = $somme + $consommation[$i]->consommation ;
          }
          $totale =Arr::add($totale,$year,$somme );
          $year = $year - 1 ;
          $moyenne = $moyenne + $somme ;

      }
      $moyenne = $moyenne/5 ;
      ksort($totale);
        [$keys, $values] = Arr::divide($totale);
          return Chartisan::build()
            ->labels($keys)
            ->dataset('Consommation',$values)
            ->dataset('Moyenne',[$moyenne,$moyenne,$moyenne,$moyenne,$moyenne]);
    }
}