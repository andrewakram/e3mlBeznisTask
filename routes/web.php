<?php

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

Route::get('/1', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "good";
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'HomeController@homePage')->name('homePage');
    Route::get('/filter-courses', 'HomeController@filterCourses')->name('filterCourses');
});

//Auth::routes();
Route::group(['prefix' => '/admin','namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'Admin\AuthController@login_view');
    Route::post('/login', 'Admin\AuthController@login')->name('login');
    Route::get('/logout', 'Admin\AuthController@logout')->name('logout');


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/home', 'HomeController@index')->name('home');


        //admin routes
        Route::resource('/categories', 'Admin\CategoryController');
        Route::post('/categories/edit', 'Admin\CategoryController@editCategory')->name('editCategory');
        Route::post('/categories/delet', 'Admin\CategoryController@deleteCategory')->name('deleteCategory');
        Route::post('/categories/editStatus', 'Admin\CategoryController@editCategoryStatus')->name('editCategoryStatus');

        Route::resource('/courses', 'Admin\CourseController');
        Route::post('/courses/edit', 'Admin\CourseController@editCourse')->name('editCourse');
        Route::post('/courses/delet', 'Admin\CourseController@deleteCourse')->name('deleteCourse');
        Route::post('/courses/editStatus', 'Admin\CourseController@editCourseStatus')->name('editCourseStatus');

    });
});
