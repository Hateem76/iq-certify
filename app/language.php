<?php

use App\Models\Language;
use Illuminate\Support\Facades\Session;

if (!function_exists('getLangValue')) {
    function getLangValue($key)
    {
        $f = Language::where('default',1)->first();
        $va = Session::get('lang') != null ?  Session::get('lang') : $f->code;

        // Generate the language file path based on the language code
        $langFilePath = resource_path("lang/$va.php");

//         dd($langFilePath,'FUCKED-UP**');

        // Check if the file exists
        if (!file_exists($langFilePath)) {
            // If the file doesn't exist, create a new one using en.php data
            $enFilePath = resource_path("lang/en.php");
            $enData = include $enFilePath;
            file_put_contents($langFilePath, '<?php return ' . var_export($enData, true) . ';');
        }

        if (file_exists($langFilePath)) {
            $langArray = include $langFilePath;
            return data_get($langArray, $key);
        }

        return $key ;

    }
}
