<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesAdmins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function showLoginForm()
    {
        return view('admin.login');
    }
    protected $redirectTo = RouteServiceProvider::HOMEADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }



}
