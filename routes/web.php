<?php

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

Route::get('/', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){
	Route::resource('doctores', 'Doctor\DoctorController');
	//Route::get('doctores/get_doctor', 'Doctor\DoctorController@get_doctor');
	Route::resource('recepcionistas', 'Receptionist\ReceptionistController', ['only' => 'index']);
	//Route::get('get_doctor_info_by_search', 'Doctor\DoctorController@get_doctor_info_by_search');
	//Route::get('getdoctorinfosearch', 'Doctor\DoctorController@getdoctorinfosearch');
});
//middleware('auth')
//middleware('role:administrador')

Route::get('/login', 'Auth\AuthController@getLogin');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
        
Route::get('/home', 'HomeController@index')->name('home');