<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutContoller extends Controller
{
    public function index($code){
        Session::put('lang',$code);
        return view('frontend.about');
    }
}
