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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/payment', 'PaymentController@index')->name('payment');
Route::get('/pay', 'PaymentController@pay')->name('pay');
Route::post('payment/success', 'PaymentController@callbackUrl')->name('payment.success');
Route::get('payment/success', 'PaymentController@success')->name('success');

Route::group(['middleware' => ['paid']], function() {
   Route::get('/home', 'HomeController@index')->name('home');
   Route::get('/dashboard','DashboardController@index')->name('dashboard');
});


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    $exitCode = Artisan::call('storage:link', [] );
    echo $exitCode;
});

Route::get('/migration', function () {
    Artisan::call('migrate');
    $exitCode = Artisan::call('migrate', [] );
    echo $exitCode;
});

Route::get('/admin:install', function () {
    Artisan::call('admin:install');
    $exitCode = Artisan::call('admin:install', [] );
    echo $exitCode;
});

Route::get('/courses', 'CourseController@index')->name('courses');
Route::get('/course/{slug}', 'CourseController@show')->name('course.show');
Route::get('/lesson/{slug}', 'CourseController@show')->name('lesson.show');

Route::get('{slug}', [
  'uses' => 'PageController@index'
])->where('slug', '([A-Za-z0-9\-\/]+)')->name('page');