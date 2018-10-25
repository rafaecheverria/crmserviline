<?php

Route::middleware(['auth', 'role:administrador|doctor|recepcionista'])->group(function(){
	//Route::resource('clinica','Clinica\ClinicaController')->middleware(['permission:leer-clinicas']);
	//Route::resource('doctores', 'Doctor\DoctorController')->middleware(['permission:leer-doctores']);
	Route::resource('recepcionistas', 'Receptionist\ReceptionistController')->middleware(['permission:leer-recepcionistas']);
	Route::resource('users/avatar', 'User\AvatarController', ['only' => 'store']);
	Route::resource('personas', 'User\UserController')->middleware(['permission:leer-personas']);
	Route::resource('update-roles', 'User\RoleUserController', ['only' => 'update'])->middleware(['permission:leer-roles']);
	Route::resource('especialidad-doctor', 'Doctor\EspecialidadDoctorController', ['only' => ['edit', 'update']])->middleware(['permission:leer-doctores|leer-especialidades']);
	Route::resource('permisos-roles', 'Roles\PermisosRolesController', ['only' => ['edit', 'update']])->middleware(['permission:leer-roles']);
	Route::resource('especialidades', 'Especialidad\EspecialidadController')->middleware(['permission:leer-especialidades']);
	Route::resource('contactos', 'Contacto\ContactosController');
	Route::resource('organizaciones', 'Organizacion\OrganizacionesController');
	Route::resource('estado_organizacion', 'Estado_Organizacion\Estado_OrganizacionController');
	Route::get('historial_estado/{id}', 'Organizacion\OrganizacionesController@historial_estado');
	Route::put('update_estado/{id}', 'Organizacion\OrganizacionesController@update_estado');
	Route::get('ficha/{id}', 'Organizacion\OrganizacionesController@ficha');

	Route::resource('cargos', 'Contacto\CargosController');

	Route::resource('roles', 'Roles\RolController')->middleware(['permission:leer-roles']);
	Route::resource('permisos', 'Permisos\PermisoController')->middleware(['permission:leer-permisos']);
	Route::resource('expediente', 'Paciente\ExpedienteController', ['only' => ['update', 'show']])->middleware(['permission:leer-pacientes']);
	
	Route::resource('mi-cuenta', 'User\PerfilController', ['only' => 'update']); 
	Route::resource('citas', 'Citas\CitasMedicasController', ['only' => ['index', 'store', 'update', 'destroy', 'edit']]);
	Route::resource('consultas', 'Citas\ConsultasMedicasController')->middleware(['permission:leer-citas']);
	Route::resource('dias','Doctor\DiasController');
	Route::get('get-ciudad/{id}','Region\RegionesController@getCiudad');
	Route::get('get-doctor/{id}','Doctor\DoctorController@getDoctor');
	//Route::get('get-region/{id}','Region\RegionesController@getRegion');
	Route::get('getClave/{id}','User\UserController@getClave');
	Route::put('put-clave/{id}','User\UserController@actualizaClave');
	Route::get('atender/{id}','Citas\ConsultasMedicasController@atender')->middleware(['permission:leer-consultas']);
	Route::get('consultas-carga','Citas\ConsultasMedicasController@carga_atendidos')->middleware(['permission:leer-citas']);
	Route::get('api','Citas\CitasMedicasController@api')->middleware(['permission:leer-consultas']);
	Route::get('dias-doctor/{id}','Doctor\DiasController@dias'); //carga los eventos en el fullcalendar.
	Route::get('pdf/{id}', 'Paciente\FichaPacienteController@reporte')->middleware(['permission:leer-pacientes']);
	Route::get('pdf-expediente/{id}', 'Paciente\ExpedienteController@reporte')->middleware(['permission:leer-pacientes']);
	Route::get('/', 'Citas\CitasMedicasController@index');
});

Route::get('login', 'Auth\AuthController@getLogin');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
