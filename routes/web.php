<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MtcompanyController;
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

    //Route::get('download',[EmployeeController::class,"exportCSV"]);
    //Route::resource('employees', EmployeeController::class);
    //Route::get('employees/{company}/can-delete', [EmployeeController::class, 'canDelete'])->name('employees.can-delete');
    Route::resource('mtcompany', MtcompanyController::class);
    Route::get('mtcompany/{mtcompany}/can-delete', [MtcompanyController::class, 'canDelete'])->name('mtcompany.can-delete');
    Route::get('downloadCompany',[MtcompanyController::class,"export_company_CSV"]);
    

});

Route::get('employees/{company}/can-delete', [EmployeeController::class, 'canDelete'])->name('employees.can-delete');
Route::resource('employees',EmployeeController::class);
Route::get('download',[EmployeeController::class,"exportCSV"]);

