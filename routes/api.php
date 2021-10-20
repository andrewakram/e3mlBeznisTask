<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/1', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "good";
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-code',function(Request $request){
    $data= \App\Models\Verification::orderBy('id','desc')->where('phone',$request->email)->first();
    if($data)
        return "<h1>$data->code</h1>";
    return "<h1>الميل غلط</h1>";
});


Route::group(['prefix' => '/user', 'namespace' => 'App\Http\Controllers\Api\User'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/verify-email', 'AuthController@codeSend');
    Route::post('/otp-check', 'AuthController@codeCheck');
    Route::post('/update-profile', 'AuthController@updateProfile');

    Route::post('/change-password', 'AuthController@changePassword');

    Route::group(['midleare' => 'auth:api'],function (){
        Route::get('/logout', 'AuthController@logout');
        Route::get('/profile-data', 'AuthController@profileData');
    });

});

Route::group(['prefix' => '/user', 'namespace' => 'App\Http\Controllers\Api\User'], function () {
    Route::get('/categories-courses', 'HomeController@categoriesCourses');

});
