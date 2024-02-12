<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
class HomeContoller extends Controller
{
    public function index(Request $request, $code=null){

        $apiKey = 'FydycJGauwX1iKJ'; // Replace with your actual API key
        $ip = $request->getClientIp(); // Get the client's IP address
//        $ip = '103.244.176.91'; // Get the client's IP address

        $response = Http::get("https://pro.ip-api.com/json/{$ip}?fields=66842623&key={$apiKey}");

        if ($response->successful()) {
            $dataj = $response->json();
            if($dataj['status']== 'fail'){
                $data['timezone'] = null;
            }else{
                $data['timezone'] = $dataj['timezone'];
//
            }
        }





        Session::put('lang',$code);

        $data['quiz'] = QuizResult::whereNotNull('user_id')
            ->with('quiz')
            ->latest()  // Orders by the created_at column in descending order (most recent first)
            ->paginate(12);
        return view('frontend.index',$data);
    }
}
