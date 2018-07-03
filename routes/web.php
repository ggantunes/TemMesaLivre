<?php
use App\User;
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
Route::get('/chooseProfile', function () {
    return view('choose-profile');
});
Route::get('/professionalRegister', function () {
    return view('registers.professional-register');
});

Route::get('/rhRegister', function () {
    return view('registers.rh-register');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware('can:confirmUser');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/confirmRegister/{token}', 'Admin\UserController@verifyRegister');

Route::get('/clearbd', function () {
    User::truncate();
});

Route::get('/all', function () {
    return User::all();
});

Route::get('/tableRegister', 'HomeController@index')->name('home');
