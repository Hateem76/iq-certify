<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \App\Models\Language;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class IPGeolocationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $apiKey = 'FydycJGauwX1iKJ'; // Replace with your actual API key
        $ip = $request->getClientIp(); // Get the client's IP address
//        $ip = '103.244.176.91'; // Get the client's IP address
        $response = Http::get("https://pro.ip-api.com/json/{$ip}?fields=66842623&key={$apiKey}");
        if ($response->successful()) {

            $data = $response->json();
            if($data['status']== 'fail'){
                return $next($request);
            }else{
                $lang = Language::where('status',1)->get()->pluck('country_code')->toArray();

                if(in_array($data['countryCode'],$lang)){
                    $language = Language::where('country_code',$data['countryCode'])->first();
                }else{
                    $language = Language::where('default',1)->first();
                }
            }
        }
        if (Session::get('lang') != null){
            $path = $request->getPathInfo();
            return redirect(Session::get('lang').$path);
        }else{
            Session::put('lang',$language->code);
            $path = $request->getPathInfo();
            return redirect($language->code.$path);
        }

    }
}
