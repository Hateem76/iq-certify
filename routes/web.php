<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::fallback(function () {
//
//    return view("404");
//
//});
Route::post('contact/store', [App\Http\Controllers\frontend\ContactContoller::class,'storepost']);

Route::get('/generate-certificate/{id}', 'App\Http\Controllers\frontend\CertificateController@generateCertificate');
Route::get('/generate-certificate-view/{id}', 'App\Http\Controllers\frontend\CertificateController@generateCertificateview');

Route::get('/test', [App\Http\Controllers\frontend\HomeContoller::class, 'index'])->name('/home');
Route::get('/switcher/{code}', [App\Http\Controllers\Management\LanguageController::class, 'switcher']);
Route::post('/submit-quiz', [App\Http\Controllers\frontend\QuizAppContoller::class, 'QuizSubmission']);
Route::post('/register-ses', [App\Http\Controllers\frontend\QuizAppContoller::class, 'RegisterSession']);
Route::post('/paynow', [App\Http\Controllers\frontend\QuizAppContoller::class, 'Paynow']);
Route::get('/resulttest', [App\Http\Controllers\frontend\QuizAppContoller::class, 'Resulttest']);
Route::get('/TestCalc', [App\Http\Controllers\frontend\QuizAppContoller::class, 'TestCalc']);

Route::get('/m', function () {
    return view('frontend.dashboard.index');
});


Route::middleware(['checkIp'])
    ->group(function () {
//        Route::get('/', function () {
//            return view('frontend.index');
//        });

        Route::get('/', [App\Http\Controllers\frontend\HomeContoller::class, 'index']);

        Route::get('/about', [App\Http\Controllers\frontend\AboutContoller::class, 'index'])->name('/about');

        Route::get('/faq', [App\Http\Controllers\frontend\FaqContoller::class, 'index'])->name('/faq');
        Route::resource('contact', App\Http\Controllers\frontend\ContactContoller::class);
        Route::get('/quizz', [App\Http\Controllers\frontend\QuizAppContoller::class, 'index'])->name('/quizz');
        Route::get('/additional-info/{uniquekey}', [App\Http\Controllers\frontend\QuizAppContoller::class, 'Additional']);
        Route::get('/result/{uniquekey}', [App\Http\Controllers\frontend\QuizAppContoller::class, 'QuizResult']);
        Route::get('/test-result/{uniquekey}', [App\Http\Controllers\frontend\QuizAppContoller::class, 'TestResult']);

    });




Route::pattern('language', '[a-z]{2}');
Route::group(['prefix' => '{language}'], function () {
//    Session::put('lang', $language);
//dd($language);
//    Route::get('/', function () {
//        return view('frontend.index');
//    });
    Route::get('/', [App\Http\Controllers\frontend\HomeContoller::class, 'index']);

    Route::get('/about', [App\Http\Controllers\frontend\AboutContoller::class, 'index'])->name('/about');
    Route::get('/faq', [App\Http\Controllers\frontend\FaqContoller::class, 'index'])->name('/faq');
    Route::resource('/contact', App\Http\Controllers\frontend\ContactContoller::class);
    Route::get('/quizz', [App\Http\Controllers\frontend\QuizAppContoller::class, 'index'])->name('/quizz');
    Route::get('/additional-info/{uniquekey}', [App\Http\Controllers\frontend\QuizAppContoller::class, 'Additional']);
    Route::get('/result/{uniquekey}', [App\Http\Controllers\frontend\QuizAppContoller::class, 'QuizResult']);
    Route::get('/test-result/{uniquekey}', [App\Http\Controllers\frontend\QuizAppContoller::class, 'TestResult']);

});



Route::get('/registration', function () {
    return view('frontend.registration');
});
//Route::resource('/',App\Http\Controllers\HomeController::class);

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\frontend\UserDashboardController::class, 'index']);
        Route::get('/results', [App\Http\Controllers\frontend\UserDashboardController::class, 'results']);
        Route::get('/rankings', [App\Http\Controllers\frontend\UserDashboardController::class, 'rankings']);
        Route::get('/settings', [App\Http\Controllers\frontend\UserDashboardController::class, 'settings']);
        Route::get('/newtest', [App\Http\Controllers\frontend\UserDashboardController::class, 'newtest']);
        Route::get('/subscribe', 'App\Http\Controllers\SubscriptionController@subscribe')->name('subscribe');
        Route::get('/unsubscribe', 'App\Http\Controllers\SubscriptionController@unsubscribe')->name('unsubscribe');
        Route::get('/take-test/{id}',  [App\Http\Controllers\frontend\QuizAppContoller::class, 'OtherTest']);



//Admin Roytes
        Route::get('/adminpanel', function () {
            return redirect('admin/dashboard');
        });
//Route::group(['middleware' => ['auth']], function() {
        Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
        Route::resource('admin/permissions', App\Http\Controllers\PermissionsController::class);
        Route::resource('admin/users', App\Http\Controllers\UserController::class);
        Route::resource('admin/dashboard',App\Http\Controllers\HomeController::class);
        Route::resource('admin/quiz', App\Http\Controllers\Management\QuizController::class);
        Route::resource('admin/question', App\Http\Controllers\Management\QuizQuestionController::class);
        Route::resource('admin/order', App\Http\Controllers\Management\PaymentController::class);
        Route::resource('admin/translation', App\Http\Controllers\Management\TranslationsController::class);
        Route::get('admin/template', [App\Http\Controllers\Management\TranslationsController::class, 'Templates']);
        Route::resource('admin/languages', App\Http\Controllers\Management\LanguageController::class);
        Route::get('admin/languages/{id}', [App\Http\Controllers\Management\LanguageController::class,'show']);
        Route::put('admin/languages/{id}', [App\Http\Controllers\Management\LanguageController::class,'update']);
        Route::get('admin/unregister', 'App\Http\Controllers\HomeController@Unregistered');



        Route::resource('admin/contacts',App\Http\Controllers\Management\ContactController::class);

    });



Auth::routes();

Route::get('/generate', 'App\Http\Controllers\frontend\CertificateController@generateCertificate2');
Route::get('/generate-report/{id}', 'App\Http\Controllers\frontend\CertificateController@generatereportview');
Route::get('/download-report/{id}', 'App\Http\Controllers\frontend\CertificateController@generatereportdownload');
