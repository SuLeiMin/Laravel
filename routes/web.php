<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\KeiyakuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Models\Keiyakukigyou;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);

Route::get('keiyakuichiran',[KeiyakuController::class, 'index']);

Route::get('/example',[ExampleController::class, 'index']);

Route::get('/executecsv', function () {
    return view('executecsv');
});

Route::get('delete/{id}','StudDeleteController@destroy');

Route::get('/keiyakuichiran',[KeiyakuController::class, 'index']);

Route::get('/keiyakutoroku',[EmployeeController::class, 'index']);

//Route::get('/keiyakuichiran',[EmployeeController::class, 'index']);

Route::get('/keiyakutoroku/{keiyaku}/can-delete',[KeiyakuController::class, 'canDelete'])->name("company.can-delete");
Route::post('/keiyakutoroku/{keiyaku}/delete',[KeiyakuController::class, 'destroy'])->name("company.destroy");

Route::get("/test", function(){
    return view("test");
});
