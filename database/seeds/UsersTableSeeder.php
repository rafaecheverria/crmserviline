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
	        'descripcion' => 'Se detecta una alergia',
	        'nacimiento' => '1987-05-16',
	        'email' => 'rafaecheverria@live.cl',
	        'password' => bcrypt('26082008'),
	        'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 1000)->create();  
    }
}
