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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ConsommationController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  
    public function index(){
       
      return view('consommation');
  }



  }















