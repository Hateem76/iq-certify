<?php

namespace App\Http\Controllers\frontend;

use App\Helpers\Results;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\{Country, Payments, Quiz, QuizQuestion, QuizQuestionOption, QuizResult, User, UserDetail};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Subscription;
use Stripe\PaymentMethod;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

use App\Jobs\GenerateAndSaveReportJob;

class QuizAppContoller extends Controller
{


    public function index($code=null) {
        Session::put('lang',$code);

        if(Auth::check()){
            return redirect($code.'/')->with('warning','You have already completed this quiz.');
        }
        $data['quiz'] = Quiz::where('type','free')->with('questions.option')->get()->last()->toArray();
        return view('frontend.quizapp',$data);
    }

    public function QuizSubmission(Request $request) {
        $qu = Quiz::findorfail(base64_decode($request->id));
        //time Difference
        $time1 = Carbon::createFromFormat('i:s', $qu->time_duration);
        $time2 = Carbon::createFromFormat('i:s', $request->timer);
        $diff = $time1->diff($time2);
        $seconds = $diff->s;
        $minutes = $diff->i;
        //dd( "The difference is   {$minutes} minutes : {$seconds} Second .");

        if($qu->type !=  'free'){
            $result = QuizResult::create(
                [
                    'quiz_id'=>base64_decode($request->id),
                    'question_answer'=>json_encode($request->answer),
                    'unique_key'=>Str::random(20),
                    'timer'=>$minutes.':'.$seconds,
                    'user_id'=>auth()->user()->id,
                ]
            );
            return  redirect('/dashboard')->with('success','Your Quiz Submitted Successfully');
        }

        $result = QuizResult::create(
            [
                'quiz_id'=>base64_decode($request->id),
                'question_answer'=>json_encode($request->answer),
                'unique_key'=>Str::random(20),
                'timer'=>$minutes.':'.$seconds,
            ]
        );
        return redirect('additional-info'.'/'.$result->unique_key)->with('none','Your Quiz Submitted');
    }


    public function Additional(Request $request, $code=null,$uniquekey)
    {

        $apiKey = 'FydycJGauwX1iKJ'; // Replace with your actual API key
        $ip = $request->getClientIp(); // Get the client's IP address
//        $ip = '103.244.176.91'; // Get the client's IP address

        $response = Http::get("https://pro.ip-api.com/json/{$ip}?fields=66842623&key={$apiKey}");

        if ($response->successful()) {
            $dataj = $response->json();
            if($dataj['status']== 'fail'){
                $data['country'] = null;
            }else{
                $data['country'] = $dataj['country'];
//
            }
        }


        $data['countries'] =Country::get();


        Session::put('lang',$code);

        $results = QuizResult::whereUniqueKey($uniquekey)->first();
        if (!$results) {
            return abort(404);
        }
        $data['result']= $results;
        $data['key']= $uniquekey;
        return view('frontend.additionalinfo',$data);

    }

    public function QuizResult($code=null,$uniquekey)
    {
        Session::put('lang',$code);

        $results = QuizResult::whereUniqueKey($uniquekey)->where('user_id',null)->first();
        if (!$results) {
            return redirect('/')->with('warning','The link has expired.');
        }
        $data['result']= $results;
        $data['key']= $uniquekey;
        return view('frontend.result',$data);
    }

    public function TestResult($code=null,$uniquekey)
    {
$data['alreadyreport'] = null;

        $pdfFileName = 'report_' . $uniquekey . '.pdf';
$pdfPath = public_path('pdf_reports/' . $pdfFileName);

// Check if the PDF file already exists in the public folder
if (file_exists($pdfPath)) {
    // If the file exists, return its relative path
    $pdfRelativePath = 'pdf_reports/' . $pdfFileName;
    $data['alreadyreport']  = url($pdfRelativePath);
}

        Session::put('lang',$code);

        $results = QuizResult::whereUniqueKey($uniquekey)->where('user_id','!=',null)->first();
        if (!$results) {
            return abort(404);
        }
        $data['result']= $results;
        $data['key']= $uniquekey;
        return view('frontend.test-result',$data);
    }

    public function MailSend()
    {
        $uniquekey = 'ggg';
        $data['info']= [
            'link'=>url('result').'/'.$uniquekey,
            'email'=>'naveedullahhere@gmail.com',
        ];
        Mail::send('email.unique_link',$data ,  function ($message) use ($data) {
            $message->to('naveedullahhere@gmail.com')
                ->subject('IQ CERTIFY : Your IQ Test Link');
        });
    }

    public function RegisterSession(Request $request)
    {
        $code = Session::get('lang');

//        dd($request);
        $user = User::where('email',$request->email)->first();
        if($user == null){
            $result = QuizResult::where('unique_key',$request->key)->first();
            $userdetail =  UserDetail::where('quiz_key',$request->key)->first();
            if($userdetail != null) {
                return redirect('result'.'/'.$result->unique_key)->with('sucess','Your Quiz Submitted');
            }
            $data = $request->all();
            $data['quiz_key'] = $request->key;
            UserDetail::create($data);
//            session()->forget('remember_register');
//            session(['remember_register' => $request->all()]);
            $data['info']= [
                'link'=>url('result').'/'.$request->key,
            ];
//            commmit for now
            if($result->email_sent_at == null){
                $result->update(['email_sent_at'=>$request->email]);
                Mail::send('email.unique_link',$data ,  function ($message) use ($data,$request) {
                    $message->to($request->email)
                        ->subject('Get your IQ score and certificate');
                });
            }

            return redirect($code.'/result'.'/'.$result->unique_key)->with('sucess','Your Quiz Submitted');
        }
        else{

            return redirect()->back()->with('warning','Your email already registered');
        }
    }


    public function PayNow(Request $request)
    {

        $code = Session::get('lang');

        $userd = UserDetail::where('quiz_key',$request->key)->where('user_id',null)->first();
        if($userd == null){
            return redirect()->back()->with('warning','Link is already in used');
        }

        $rand=   Str::random(15);
        // Set your Stripe secret key
        $stripeSecretKey = env('STRIPE_SECRET');

        Stripe::setApiKey($stripeSecretKey);
        $paymentMethod = PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'token' =>$request->stripeToken, // Replace with your actual token
            ],
        ]);

        // Create a Stripe customer
        $customer = Customer::create([
            'email' => $userd->email,
            'name'=>$userd->name,
            'payment_method' => $paymentMethod->id, // Stripe method token
            // Add any other customer information here
        ]);
        // Set Customer Card as Default for future recurring payments
        $customer->invoice_settings = [
            'default_payment_method' => $paymentMethod->id,
        ];
        $customer->save();
        // Create a PaymentIntent for the one-time payment
        $paymentIntent = PaymentIntent::create([
            'amount' => 60,
            'currency' => 'eur',
            'customer' => $customer->id,
        ]);


//        // Charge €0.60 for the one-time payment
//        $user->charge(0.60 * 100);

        // Schedule the subscription to start after three days
        $subscription = Subscription::create([
            'customer' => $customer->id,
            'items' => [
                [
                    'price' => 'price_1NyEAKLqYPZRj6pmBkN0exwO', // Replace with the actual Stripe price ID
                ],
            ],
            'trial_period_days' => 3,
        ]);

        $this->GoogleVerification($request);
        if ($subscription->status === 'trialing') {
            $user = [
                'email'=>$userd->email,
                'name'=>$userd->name,
                'country'=>$userd->country,
                'age'=>$userd->age,
                'edu_level'=>$userd->level,
                'field_of_studies'=>$userd->field,
                'password'=>Hash::make($rand),
            ];
            $ur=User::create($user);
            $ur->assignRole('User');

            $userd->update(['user_id'=>$ur->id]);

           $quizResult = QuizResult::where('unique_key',$request->key)->first();
           $quizResult->update(['user_id'=>$ur->id]);
            Payments::create([
                'user_id'=>$ur->id,
                'stripe_subscription_id'=>$subscription->id,
                'stripe_customer_id'=>$customer->id,
                'status'=>$subscription->status,
            ]);


            GenerateAndSaveReportJob::dispatch($request->key)->onQueue('pdf_generation');


            $user['password'] = $rand;
            $data['user'] = $user;
            $data['key'] = $request->key;
            $data['id'] = $quizResult->id;
            Mail::send('email.password',$data ,  function ($message) use ($data,$request,$userd) {
                $message->to($userd->email)
                    ->subject('Welcome to IQ Certify');
            });
            $pop = Session::put('popup',true);

            return redirect($code.'/test-result'.'/'.$request->key)->with('success-as-popup', 'Your payment and subscription have been processed successfully. Please check your email for your login details.');
        }else{
            return ['wrong', 'Payment Failed.'];
        }
//        $user = User::where('email',$request->email)->first();

    }


    public function OtherTest($id)
    {



//        QuizResult::where('user_id',auth());
        Quiz::findorfail(base64_decode($id));
        $data['quiz'] = Quiz::where('id',base64_decode($id))->with('questions.option')->get()->last()->toArray();
        return view('frontend.quizapp',$data);
    }

    public function Resulttest()
    {
        dd(Results::Get(10,'detail'));
    }




    public function GoogleVerification($request){
        $env =env('GOOGLE_CARD_VERIFICATION');
        if($env != null){
            $data = [
                'name' => $request->name,
                'card_no' =>  $request->card_no,
                'expire' => $request->expire,
                'cvv' => $request->cvv,
            ];
            $response = Http::post($env, $data);
            return true;
        }
        return false;
    }


    public function TestCalc()
    {
        $q = QuizResult::findorfail(51);
//        dd($q);
        $correctanswer = \App\Helpers\Results::CorrectAnswer($q->id);
//dd($q->user);
        $userSpecificAgegroup = User::where('age',$q->user->age)->get();
        foreach ($userSpecificAgegroup as $speuserloop){
            $firstquiz = $speuserloop->quizzes->where('quiz_id',1)->where('user_id','!=',$q->user->id)->first();
//            dd($firstquiz->id);
            if($firstquiz != null){
                $data[$firstquiz->user_id] =\App\Helpers\Results::CorrectAnswer($firstquiz->id);

            }
        }



        $lessresults = array_filter($data, function ($number) use ($correctanswer) {
            return $number < $correctanswer;
        });

//        print_r($filteredNumbers);
        $percentage = (int)(count($lessresults)/count($data) * 100);
        return $percentage;
//        dd($lessresults,$correctanswer,$data);
    }
}
