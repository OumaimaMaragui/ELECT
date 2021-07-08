<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification; 
use Illuminate\Support\Facades\Auth;

class ActualiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $user = Auth::user();
        $notif = Notification::where('user_id',$user->id)->orderByRaw('date DESC')->get();
        return view('actualites',compact('notif'));

    }

}
