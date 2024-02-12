<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactContoller extends Controller
{
    public function index($code){
        Session::put('lang',$code);

        return view('frontend.contact');
    }
    public function storepost(Request $request){
//        dd($request);

        $data['user']= $request;
        Mail::send('email.contact',$data ,  function ($message) use ($request) {
            $message->to('contact@iq-certify.com')
                ->subject('IQ CERTIFY:'.' '.$request->contactSubject);
        });


        return redirect()->back()->with('success-popup','Your query has been successfully submitted.');
    }
}
