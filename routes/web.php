<?php
use App\User;
use App\DescricaoLocal;
use App\Local;
use Illuminate\Support\Facades\DB;
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
    return view('registers.professional');
});

Route::get('/rhRegister', function () {
    return view('registers.rh');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware('can:confirmUser');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/confirmRegister/{token}', 'Admin\UserController@verifyRegister');

Route::get('/trunc-users', function () {
    User::truncate();
});
Route::get('/trunc-locals', function () {
    Local::truncate();
});

Route::get('/all', function () {    
    //return User::all();
    //return Local::all();
    //return DescricaoLocal::all();

});

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){
	Route::resource('places', 'LocalController')->middleware('can:admin');
});
