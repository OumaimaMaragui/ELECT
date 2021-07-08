<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Consommation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ConsommationChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $user = Auth::user()->id;
        $annuelle = Consommation::where('user_id',$user)->orderByRaw('date ASC')->get();
        
        $label = [];
        $conso = [];

        foreach( $annuelle as $a ){
          $year =  Carbon::createFromFormat('Y-m-d H:i:s', $a->date)->year;
          array_push($label,$year);
          array_push($conso,$a->consommation);
         }  
          return Chartisan::build()
            ->labels($label)
            ->dataset('Consommation',$conso);
    }
}