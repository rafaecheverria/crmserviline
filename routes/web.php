<?php

Route::middleware(['auth', 'role:administrador|doctor|recepcionista'])->group(function(){
	Route::resource('clinica','Clinica\ClinicaController')->middleware(['permission:leer-clinicas']);;
	Route::resource('doctores', 'Doctor\DoctorController')->middleware(['permission:leer-doctores']);;
	Route::resource('recepcionistas', 'Receptionist\ReceptionistController')->middleware(['permission:leer-recepcionistas']);;
	Route::resource('users/avatar', 'User\AvatarController', ['only' => 'store']);
	Route::resource('personas', 'User\UserController')->middleware(['permission:leer-personas']);;
	Route::resource('update-roles', 'User\RoleUserController', ['only' => 'update']);
	Route::resource('especialidad-doctor', 'Doctor\EspecialidadDoctorController', ['only' => ['edit', 'update']]);
	Route::resource('permisos-roles', 'Roles\PermisosRolesController', ['only' => ['edit', 'update']]);
	Route::resource('especialidades', 'Especialidad\EspecialidadController')->middleware(['permission:leer-especialidades']);;
	Route::resource('pacientes', 'Paciente\PacienteController')->middleware(['permission:leer-pacientes']);;
	Route::resource('roles', 'Roles\RolController')->middleware(['permission:leer-roles']);
	Route::resource('permisos', 'Permisos\PermisoController')->middleware(['permission:leer-permisos']);
	Route::resource('antecedentes', 'Paciente\AntecedenteController', ['only' => ['update', 'edit']]);
	Route::resource('expediente', 'Paciente\ExpedienteController', ['only' => ['update', 'show']]);
	Route::resource('ficha', 'Paciente\FichaPacienteController', ['only' => ['show']]);
	Route::resource('pacientes/perfil', 'Paciente\PerfilController', ['only' => 'show']); //ruta que se debe configurar
	Route::resource('citas', 'Citas\CitasMedicasController', ['only' => ['index', 'store', 'update', 'destroy', 'edit']]);
	Route::resource('consultas', 'Citas\ConsultasMedicasController')->middleware(['permission:leer-consultas']);;
	Route::get('get-doctor/{id}','Doctor\DoctorController@getDoctor');
	Route::get('getClave/{id}','User\UserController@getClave');
	Route::get('putClave/{id}','User\UserController@putClave');
	Route::get('doctor/{id}','Citas\ConsultasMedicasController@atender');
	Route::get('atender/{id}','Citas\ConsultasMedicasController@atender');
	Route::get('consultas-carga','Citas\ConsultasMedicasController@carga_atendidos');
	Route::get('api','Citas\CitasMedicasController@api');
	Route::get('pdf/{id}', 'Paciente\FichaPacienteController@reporte');
	Route::get('/', 'Citas\CitasMedicasController@index');
});

Route::get('login', 'Auth\AuthController@getLogin');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
        
//Route::get('/home', 'HomeController@index')->name('home');