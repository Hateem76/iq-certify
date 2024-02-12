<?php

namespace App\Helpers;
use App\Models\Language;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\Translations as Translation;
use Auth;
use Mail;
use Illuminate\Support\Facades\Session;



class Translations{

    public static function Translations($key,$template=null){
        $f = Language::where('default',1)->first();
        $allLanguage = Language::where('status',1)->get();

        $va =  Session::get('lang') != null ?  Session::get('lang') : $f->code;
//        $t = Translation::where('code',$va)->where('key',$key)->first();
        foreach ($allLanguage as $language){
            $t = Translation::where('code',$language->code)->where('template',$template)->where('key',$key)->first();
            if($t == null){
                Translation::create([
                    'created_by'=>1,
                    'code'=>$language->code,
                    'template'=>$template,
                    'key'=>$key,
                    'value'=>$key,
                ]);
            }
        }

        if($va == 'en'){
            return $key;
        }else{
            if($template == null){
                $translation = Translation::where('code',$va)->where('key',$key)->where('template',null)->first();
            }else{
                $translation = Translation::where('code',$va)->where('key',$key)->where('template',$template)->first();
            }
            return $translation->value;

        }





    }



    public static function Selectedlanguage(){
        $f = Language::where('default',1)->first();
        $va =  Session::get('lang') != null ?  Session::get('lang') : $f->code;

        return $va;
    }


}

