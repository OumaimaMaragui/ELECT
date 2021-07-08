<?php

namespace App\Http\Controllers;

use App\Models\Mensualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DonController extends Controller
{
    public function index(){

        return view('don');
    }

    public function donate(Request $request){

        $id = $request->id;
        $conso = $request->conso;
        $totale = $conso;
        $donateur = Auth::user()->id;

        $montant = Mensualite::where('user_id',$donateur)->get();
        
        $montantDonataire = Mensualite::where('user_id',$id)->get();
        if($montantDonataire == '[]'){
            return Redirect::back()->with('error', "L'identifiant est invalide");
        }
        $montant = $montant[0]->montant;
        $montantDonataire = $montantDonataire[0]->montant;
        if($totale > $montant){
            return Redirect::back()->with('error', 'Votre solde est insuffisant pour effectuer cette transaction');
        }else{
            $reste = (float) $montant - (float) $totale;
            $donateur = DB::table('mensualites')
                        ->where('user_id',$donateur)
                        ->update(['montant'=>$reste]);
            $montantDonataire =(float) $montantDonataire + (float) $totale;
            $donataire = DB::table('mensualites')
                        ->where('user_id',$id)
                        ->update(['montant'=>$montantDonataire]);
            return Redirect::back()->with('message', 'Votre don est effectué avec succès');
                    }

    }
}
