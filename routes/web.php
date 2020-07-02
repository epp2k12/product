<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');



Route::get('profile', function () {
    //
    return view('profile');
})->name('profile');

Route::post('upload_image','UserController@upload_avatar')->name('upload_image');

Auth::routes(); 

Route::get('/test', function() {

    $teams = array("okc","lakers","bulls");
    session()->put('teams', $teams);
    session()->push('teams', 'nuggets');
    // session()->flush();
    // $value=session()->pull('teams');
    // dd(session()->all());
    // dd($value);
    $environment = App::environment();
    dd(config('app'));

});
