<?php

use App\Http\Controllers\Auth\CustomLoginController;
use Illuminate\Support\Facades\Route;

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

Route::group(["middleware" => ["lang"]], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    
    Auth::routes();

    Route::post('custom-login', [CustomLoginController::class,'login'])->name('custom-login');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get("change-lang/{lang}", function($lang){
        session()->put("lang", $lang);
        return redirect()->back();
    })->name("change-lang");
});




