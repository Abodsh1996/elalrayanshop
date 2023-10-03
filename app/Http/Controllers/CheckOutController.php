<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index(){
        $data['carts'] = Cart::where('user_id',Auth::id())->get();
        $data['route'] = '';
        return view('website.checkout.index',$data);
    }
}
