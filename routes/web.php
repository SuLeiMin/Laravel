<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(["register" => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("auth")->group(function(){
    Route::resource("employes", EmployeeController::class);
    ROute::get("employes/{company}/can-delete", [EmployeeController::class, "canDelete"])->name("employes.can-delete");
});