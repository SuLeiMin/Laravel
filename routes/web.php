<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\KeiyakuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Models\Keiyakukigyou;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

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
    Route::resource("companies", CompanyController::class);
    ROute::get("companies/{company}/can-delete", [CompanyController::class, "canDelete"])->name("companies.can-delete");
});