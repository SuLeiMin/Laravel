<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MtcompanyController;
use App\Http\Controllers\EmployeeController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(MtcompanyController::class)->group(function(){
    Route::get('/mtcompanies','index')->name('mtcompanies.index');
    Route::get('/mtcompanies/create','create')->name('mtcompanies.create');
    Route::post('/mtcompanies/create','store')->name('mtcompanies.store');
    Route::get('/mtcompanies/{id}','show')->name('mtcompanies.show');
    Route::get('/mtcompanies/edit/{id}','edit')->name('mtcompanies.edit');
    Route::post('mtcompanies/edit/{id}','update')->name('mtcompanies.update');
    Route::delete('/mtcompanies/delete/{mtcompany}','destroy')->name('mtcompanies.destroy');
    Route::get('downloadCompany','export_company_CSV')->name('mtcompanies.export_company_CSV');
    Route::get('mtcompanies/{mtcompanies}/can-delete', 'canDelete')->name('mtcompanies.can-delete');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employees','index')->name('mtcompanies.index');
    Route::get('/employees/create','create')->name('mtcompanies.create');
    Route::post('/employees/create','store')->name('mtcompanies.store');
    Route::get('/employees/{id}','show')->name('mtcompanies.show');
    Route::get('/employees/edit/{id}','edit')->name('mtcompanies.edit');
    Route::post('employees/edit/{id}','update')->name('mtcompanies.update');
    Route::delete('/employees/delete/{mtcompany}','destroy')->name('mtcompanies.destroy');
    Route::get('downloadCompany','export_company_CSV')->name('mtcompanies.export_company_CSV');
    Route::get('employees/{employees}/can-delete', 'canDelete')->name('mtcompanies.can-delete');
});

/*
Route::middleware("auth")->group(function(){
    Route::resource('mtcompany', MtcompanyController::class);
    Route::get('downloadCompany',[MtcompanyController::class,"export_company_CSV"]);
});*/
