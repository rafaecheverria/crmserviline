<?php
Route::get('/', 'HomeController@index');
Route::prefix('admin')->group(function(){
	Route::resource('doctores', 'Doctor\DoctorController');
	Route::resource('recepcionistas', 'Receptionist\ReceptionistController');
	Route::resource('users/avatar', 'User\AvatarController', ['only' => 'store']);
	Route::resource('personas', 'User\UserController');
	Route::resource('roles', 'User\RoleUserController', ['only' => 'update']);
	Route::resource('pacientes', 'Paciente\PacienteController');
	Route::resource('antecedentes', 'Paciente\AntecedenteController', ['only' => ['update', 'edit']]);
	Route::resource('pacientes/perfil', 'Paciente\PerfilController', ['only' => 'show']);
	Route::resource('citas', 'Citas\CitasMedicasController');
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