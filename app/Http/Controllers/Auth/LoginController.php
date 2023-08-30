<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;


//    protected $redirectTo = RouteServiceProvider::HOME;


    public function authenticated()
    {

        if (Auth::user()->is_admin == 1) {

            return redirect()->route('dashboard')->with('success','login Successfully');

        } else {
            return redirect('/')->with('success','login Successfully');
        }
    }




    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
