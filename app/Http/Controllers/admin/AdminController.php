<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
  
    public function index(){
        $id = Auth::user()->id;
        $sender = Aide::where('sender_id','!=',$id)->orderBy('created_at','desc')->limit(1)->get();
        if($sender == '[]'){
            return view('admin.empty');
        }else{
        $sender = $sender[0]->sender_id;
        return view('admin.home',compact('sender'));
    }}
}
