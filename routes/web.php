<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadsController;
use App\Models\Employee;
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

    Route::get('download',[EmployeeController::class,"exportCSV"]);
    Route::resource('employees', EmployeeController::class);
    Route::get('employees/{company}/can-delete', [EmployeeController::class, 'canDelete'])->name('employees.can-delete');
    Route::get("/search",[EmployeeController::class,'search']);
    /*Route::get('/index',[EmployeeController::class,'index'])->name('employees.index');
    Route::get('/create',[EmployeeController::class,'create'])->name('employees.create');
    Route::post('/store', [EmployeeController::class,'store'])->name('employees.store');
    Route::get('/show/{id}', [EmployeeController::class,'show'])->name('employees.show');
    Route::get('/edit/{id}', [EmployeeController::class,'edit'])->name('employees.edit');
    Route::post('/update/{id}', [EmployeeController::class,'update'])->name('employees.update');
    Route::post('/destroy/{id}',[EmployeeController::class,'destory'])->name('employees.destroy');*/

});

