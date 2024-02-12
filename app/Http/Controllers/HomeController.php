<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:dashboard', ['only' => ['index']]);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


        public function index()
        {
            /*if(!auth()->user()->hasPermissionTo('dashboard-permission')){
    //            return abort(401);
                return redirect('/')->with('wrong','Unauthorized');

            }*/
            $order = [];

            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'User');
            })->get();

            $data['trial'] = \App\Models\Payments::where('status', 'trialing')->get();
            $data['active'] = \App\Models\Payments::where('status', 'active')->get();
            $data['takenbutnotpurchased'] = \App\Models\QuizResult::where('user_id', null)->get();
//        $data['projects'] = Projects::get();
//        $data['jobs'] = Job::orderBy('created_at', 'desc')->take(10)->get();

//        $contact = [];
            return view('management/home/index', $data);

        }
    public function Unregistered(){
//            dd('dd');
         $data['user'] =    UserDetail::where('user_id',null)->get();
            return view('management.unregistered.index',$data);
        }
}
