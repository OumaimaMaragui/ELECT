<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Aide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
class UrgenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($sender){
        $id = Auth::user()->id;
        $url = url()->current();
        if(str_contains($url, 'urgente')==1){
            $type = 'urgence';
            $titre = 'Panne urgentes';
        }elseif(str_contains($url, 'information')==1){
            $type = 'information';
            $titre = "Demandes d'informations";
        }elseif(str_contains($url, 'reclamation')==1){
            $type = 'reclamation';
            $titre = "Réclamations";
        }

        $aides = DB::table('aides')
            ->join('users', 'aides.sender_id', '=', 'users.id')
            ->select('users.*','aides.*')
            ->where('aides.type',$type)
            ->where('receiver_id',$id)
            ->orderBy('aides.created_at','desc')
            ->get()
            ->unique('sender_id');
/*             ->unique(['sender_id','receiver_id']);
 */

            $discussion = DB::table('aides')
                ->join('users', function ($join) {
                $join->on('aides.receiver_id', '=', 'users.id')
                ->orOn('aides.sender_id', '=', 'users.id'); 
                })
/*                 ->select('users.id','aides.type','aides.sender_id','aides.receiver_id')
 */             
                ->select('users.*','aides.*')
                ->where('aides.type',$type)
                 ->where(function ($query) use ($sender){
                    $query->where('sender_id',$sender);
                    $query->orWhere('receiver_id',$sender);
                })
                 ->orderBy('aides.created_at','asc')
                 ->get();
                return view('admin.urgente',compact('aides','discussion','titre'));

    }

    public function send(Request $request,$receiver){

        $sender = Auth::user()->id;
        $url = url()->current();
        if(str_contains($url, 'urgente') == 1){
            $type = 'urgence';
        }elseif(str_contains($url, 'information') == 1){
            $type = 'information';
        }elseif(str_contains($url, 'reclamation') == 1){
            $type = 'reclamation';
        }
       
        $aide = new Aide();
        $aide->sender_id = $sender;
        $aide->receiver_id = $receiver;
        $aide->message = $request->message;
        $aide->type = $type;
        $aide->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $aide->save();
        return Redirect::back();

        
    }

}

