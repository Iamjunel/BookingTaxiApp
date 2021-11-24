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


Route::get('care-taxi', 'App\Http\Controllers\CompanyController@careTaxi');