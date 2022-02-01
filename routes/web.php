<?php

use App\Employee;
use App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace'=>'Backend','middleware'=>'auth'],function(){

    Route::resource('users', 'UserController');
    Route::resource('countries', 'CountryController');
    Route::resource('states', 'StateController');
    Route::resource('cities', 'CityController');
    Route::resource('dpts', 'DepartmentController');

    Route::POST('users/{user}/change-password', 'UserController@changePassword')->name('users.changePassword');
});

// Api routes
Route::group(['namespace'=>'Api','middleware'=>'auth'],function(){

    Route::get('/employees/countries','EmployeeDataController@Country');
    Route::get('/employees/{country}/states','EmployeeDataController@state');
    Route::get('/employees/{state}/cities','EmployeeDataController@city');
    Route::get('/employees/departments','EmployeeDataController@department');

// employee create
    Route::get('/employees/index','EmployeeController@index');
    Route::post('/employee/store','EmployeeController@store');
    Route::delete('/employees/destroy/{empId}','EmployeeController@destroy');
    Route::get('/employee/edit/{employee}','EmployeeController@show');
    Route::put('/employee/update/{employee}','EmployeeController@update');
});


Route::get('{any}',function(){
    return view('backend.employees.index');
})->where('any','.*');


