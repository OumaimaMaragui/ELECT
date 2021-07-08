<?php

namespace App\Http\Controllers;

use App\Models\Aide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id = Auth::user()->id;
        $aides = Aide::where('sender_id',$id)->orWhere('receiver_id',$id)->orderBy('created_at','asc')->get();

         return view('discussion',compact('aides'));
    }
}
