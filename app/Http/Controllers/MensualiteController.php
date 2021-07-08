<?php

namespace App\Http\Controllers;

use App\Models\Mensualite;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MensualiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $id = Auth::user()->id;
        $mensualite = Mensualite::where('user_id',$id)->get();
        if($mensualite == "[]"){
            $suggestion = 0;
        $mensualite = new Mensualite();
        $mensualite->user_id = $id;
        $mensualite->montant = 0;
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

            $conso = $consommation;

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
    
        $mensualite->suggestion = $suggestion;
        $mensualite->created_at = Carbon::now();
        $mensualite->save();

        }else{
        $suggestion = $mensualite[0]->suggestion;
}
        return view('mensualite',compact('suggestion'));
   }

    public function ajuster(Request $request){ 
       
        $id = Auth::user()->id;
         // nouveau montant suggeré 
        $suggestion = $request->suggestion;
        // mensualite suggeré a partir de l'historique
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

            $conso = $consommation;

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

        $app =(int)($conso * $prix) + 1 ;
   
        if ($suggestion >= $app){
        DB::table('mensualites')
              ->where('user_id', $id)
              ->update(['suggestion' => $suggestion]);
              return Redirect::back()->with('message', 'Votre mensualite est modifiée avec succes');
    }else{
        return Redirect::back()->with('error', 'Votre mensualite est inférieure à votre consommation veuillez choisir une mensualités plus adéquate');
    }
}
}
