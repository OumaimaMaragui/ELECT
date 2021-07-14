<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use Illuminate\Http\Request;
use App\Charts\AnnuelleChart;
use App\Models\Quotidienne;
use App\Charts\MensuelleChart;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ConsommationController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  
    public function index(){
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
              $month = str_pad(strval($month), 2, '0', STR_PAD_LEFT);        

              if($month == 0){
                $year = $year - 1 ;
                $month = 12 ;
              }
              }  

      return view('consommation');
  }



  }















