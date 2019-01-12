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
	        'nacimiento' => '1987-05-16',
	        'email' => 'rafaecheverria@live.cl',
	        'password' => bcrypt('26082008'),
	        'remember_token' => str_random(10),
        ]);

        factory(App\User::class)->create([
	        'nombres' => 'Luciano Michael',
	        'rut' => '17.183.394-9',
	        'apellidos' => 'Fuentes Bustos',
	        'direccion' => 'Mutupin km 8.5',
	        'telefono' => '997650140',
	        'actividad' => 'Ingeniero Civil',
	        'nacimiento' => '1998-12-14',
	        'email' => 'lfuentes@serviline.cl',
	        'password' => bcrypt('171833949'),
	        'remember_token' => str_random(10),
        ]);

        factory(App\User::class)->create([
	        'nombres' => 'Rafael Agustín',
	        'rut' => '14.566.236-2',
	        'apellidos' => 'Ramos Lara',
	        'direccion' => 'parcela 15 La Unión de Ninquihue',
	        'telefono' => '974837110',
	        'actividad' => 'Profesor de Historia',
	        'nacimiento' => '1980-04-26',
	        'email' => 'rramos@serviline.cl',
	        'password' => bcrypt('145662362'),
	        'remember_token' => str_random(10),
        ]);

    }
}
