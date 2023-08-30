<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContrller extends Controller
{
    public function index(){
        $data['route'] = 'dashboard';
        return view('admin.dashboard',$data);
    }
}
