<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Aide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
         return view('aide');
    }
    public function send(Request $request,$id){
        $sender = $id;
        $receiver = Admin::first()->id;
        $message = $request->message;
        $type = $request->type;
        $aide = new Aide();
        $aide->sender_id =$sender;
        $aide->receiver_id =$receiver;
        $aide->message =$message;
        $aide->type =$type;
        $aide->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $aide->save();
        return redirect('/aide')->with('msg', 'Message encoyé avec succès');
        
    }
}



