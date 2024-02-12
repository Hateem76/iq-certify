<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Http\Request;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe\Subscription;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        if(!$request->has('type')){
            return redirect('/admin/dashboard')->with('warning','Something went');
        }
        $data['payments'] = Payments::where('status',$request->type)->get();
        return view('management.payments.index',$data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $stripeSecretKey = env('STRIPE_SECRET');

        Stripe::setApiKey($stripeSecretKey);
        $paymet = Payments::findorfail($id);



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




        return view('management.payments.show',[
            'invoices' => $invoices,
            'subscription'=>$subscription,
            'currentPeriodEnd'=>$currentPeriodEnd,
            'hasActiveSubscription' => $hasActiveSubscription,
            'payments' => $paymet
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
