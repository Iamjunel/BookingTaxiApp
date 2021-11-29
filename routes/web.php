<?php

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


/* Route::get('/{any}', function() {
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*'); */
//Route::get('/admin', function () {
//    return view('welcome');
//});
Route::get('/', function() {
    return view('welcome');
});
Route::get('admin/login', 'App\Http\Controllers\CompanyController@login');
Route::get('admin', 'App\Http\Controllers\CompanyController@index');
Route::get('admin/company', 'App\Http\Controllers\CompanyController@getAllCompany');
Route::get('admin/register', 'App\Http\Controllers\CompanyController@companyRegister');
Route::post('admin', 'App\Http\Controllers\CompanyController@store');


//hidden routes
Route::delete('admin/company/{id}', 'App\Http\Controllers\CompanyController@deleteCompanyById');
Route::get('company/details/{id}', 'App\Http\Controllers\CompanyController@getCompanyById');
//Route::post('company', 'App\Http\Controllers\CompanyController@store');
Route::patch('company/{id}', 'App\Http\Controllers\CompanyController@update');


Route::get('care-taxi', 'App\Http\Controllers\CareTaxiController@index');
Route::get('care-taxi/login', 'App\Http\Controllers\CareTaxiController@login');
Route::get('care-taxi/booking', 'App\Http\Controllers\CareTaxiController@availableSlot');
Route::get('care-taxi/slot/{id}/{date}', 'App\Http\Controllers\CareTaxiController@slotDetailDate');
Route::get('care-taxi/slot/edit/{id}/{date}', 'App\Http\Controllers\CareTaxiController@editDetailDate');
Route::post('care-taxi/slot/status/update', 'App\Http\Controllers\CareTaxiController@statusUpdate');
//Route::get('care-taxi/booking/date', 'App\Http\Controllers\CareTaxiController@slotDetailDate');
//Route::get('care-taxi/booking/date/{id}/{date}', 'App\Http\Controllers\CareTaxiController@slotDetailDate');
Route::get('care-taxi/company/edit/{id}', 'App\Http\Controllers\CareTaxiController@edit');
Route::post('care-taxi/company/update', 'App\Http\Controllers\CareTaxiController@update');

Route::post('care-taxi/checklogin', 'App\Http\Controllers\CareTaxiController@checkLogin');
Route::get('care-taxi/logout', 'App\Http\Controllers\CareTaxiController@logout');

Route::get('calendar-event', [CalenderController::class, 'index']);
Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);


Route::get('user', 'App\Http\Controllers\UserController@index');
Route::get('user/companylist', 'App\Http\Controllers\UserController@getAllCompany');
Route::get('user/slot', 'App\Http\Controllers\UserController@availableSlot');