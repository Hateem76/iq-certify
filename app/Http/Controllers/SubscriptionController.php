<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Subscription;
class SubscriptionController extends Controller
{


    public function unsubscribe()
    {


        $stripeSecretKey = env('STRIPE_SECRET');

        Stripe::setApiKey($stripeSecretKey);
        $paymet = Payments::whereUserId(auth()->user()->id)->get()->last();


        $subscription = Subscription::retrieve($paymet->stripe_subscription_id);
        if ($subscription->status === 'trialing') {
            // Handle trial subscription differently (e.g., do not cancel it)
            return redirect()->back()->with('warning', 'You can not unsubscribe the trial Account.');
        } else {
            try {
                // Retrieve the user's subscription
                // Cancel the subscription
                $subscription->cancel();
                // Update the user's subscription status in your database
                $paymet->update(['status' => 'canceled']);
                return redirect()->back()->with('success', 'Subscription canceled successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('wrong', 'Failed to cancel subscription. Please try again.');
            }
        }
    }

    public function subscribe()
    {
        $stripeSecretKey = env('STRIPE_SECRET');
        Stripe::setApiKey($stripeSecretKey);
        $payment = Payments::whereUserId(auth()->user()->id)->latest()->first(); // Get the latest payment record
        $customerID = $payment->stripe_customer_id;


//Check if user has active subscription
        $subscriptions = Subscription::all([
            'customer' => $customerID, // Replace with the actual Stripe customer ID
        ]);

        // Check if any of the subscriptions are active
        $hasActiveSubscription = false;

        foreach ($subscriptions as $subscription) {
            if ($subscription->status === 'active') {
                $hasActiveSubscription = true;
                break; // Exit the loop as soon as an active subscription is found
            }
        }
        if ($hasActiveSubscription) {
            // The user has an active subscription
            return redirect()->back()->with('warning', 'You already have an active subscription.');
        }
        // Check if any of the subscriptions are active




        // Create a new subscription for the user
        $subscription = Subscription::create([
            'customer' => $customerID, // Use the customer's Stripe ID
            'items' => [
                [
                    'price' => 'price_1NyEAKLqYPZRj6pmBkN0exwO', // Replace with the actual Stripe price ID
                ],
            ],
        ]);

        $payment->update(['status' => 'active']);
        return redirect()->back()->with('success', 'Subscription reactivated successfully.');







    }

}
