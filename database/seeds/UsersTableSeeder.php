<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\User::class)->create([
	        'nombres' => 'Rafael Armando',
	        'rut' => '16.447.779-7',
	        'apellidos' => 'Echeverria Reyes',
	        'direccion' => 'El Canelo 1135',
	        'telefono' => '957590687',
	        'actividad' => 'Servicios Informáticos en la municipalidad de San Carlos',
	        'diagnostico' => 'Alergia a la primavera',
	        'descripcion' => 'Se detecta una alergia',
	        'titulo' => 'Ingeniero en informatica',
	        'estudios_complementarios' => 'no tiene',
	        'posicion' => 'adiministrativo',
	        'nacimiento' => '16-05-1987',
	        'fecha_admision' => '2014',
	        'email' => 'rafaecheverria@live.cl',
	        'speciality_id' => '1',
	        'password' => bcrypt('26082008'),
	        'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 1000)->create();  
    }
}
