<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use App\Models\UserDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\{
    Stripe,
    Customer,
    Invoice,
    Subscription
};

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->email);

        // $user = User::find(83);
        // Auth::login($user);
        // return redirect('/');
        return view('frontend.dashboard.index');
        //
    }
    public function newtest()
    {
        $data['quiz'] = Quiz::whereType(null)->get();
        return view('frontend.dashboard.newtest',$data);
        //
    }
    public function results()
    {
        $quiz = QuizResult::whereUserId(auth()->user()->id)->with('quiz')->get();
        return view('frontend.dashboard.results',compact('quiz'));
    }
    public function rankings()
    {
        $quiz = QuizResult::whereHas('user', function($query){
            $query->where('country', Auth::user()->country);
        })->with('quiz')->limit(18)->get();
        return view('frontend.dashboard.rankings',compact('quiz'));
        //
    }
    public function settings()
    {

        // Set your Stripe secret key
        $stripeSecretKey = env('STRIPE_SECRET');

        Stripe::setApiKey($stripeSecretKey);
        $paymet = Payments::whereUserId(auth()->user()->id)->get()->last();



        $customerSubscriptions = Subscription::all([
            'customer' => $paymet->stripe_customer_id,
        ]);
        $hasActiveSubscription = false;

        foreach ($customerSubscriptions as $subscription) {
            if ($subscription->status === 'active') {
                $hasActiveSubscription = true;
                // If you want to do something with the active subscription, you can access it here: $subscription
                break; // Exit the loop as soon as an active subscription is found
            }
        }


        try {
            // Retrieve the user's subscription
            $subscription = Subscription::retrieve($paymet->stripe_subscription_id);

            // Get the current period end date
            $currentPeriodEnd = date('d-m-y', $subscription->current_period_end);

        } catch (\Exception $e) {
            $currentPeriodEnd = null;
            $subscription = null;
        }


// Replace 'customer_id' with the actual customer ID
//        $customer = Customer::retrieve($paymet->stripe_customer_id);
        $invoices = Invoice::all(['customer' => $paymet->stripe_customer_id]);

//        dd($invoices);
        return view('frontend.dashboard.settings',
            [
                'invoices' => $invoices,
                'subscription'=>$subscription,
                'currentPeriodEnd'=>$currentPeriodEnd,
                'hasActiveSubscription' => $hasActiveSubscription,
                'payments' => $paymet
            ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDashboard  $userDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(UserDashboard $userDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDashboard  $userDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDashboard $userDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDashboard  $userDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDashboard $userDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDashboard  $userDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDashboard $userDashboard)
    {
        //
    }
}
