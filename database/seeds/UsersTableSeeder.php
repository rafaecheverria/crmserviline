<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\User::class)->create([
	        'name' => 'Rafael Armando',
	        'rut' => '16.447.779-7',
	        'last_name' => 'Echeverria Reyes',
	        'address' => 'El Canelo 1135',
	        'phone' => '957590687',
	        'activity' => 'Servicios Informáticos en la municipalidad de San Carlos',
	        'diagnosis' => 'Alergia a la primavera',
	        'description' => 'Se detecta una alergia',
	        'title' => 'Ingeniero en informatica',
	        'complementary_studies' => 'no tiene',
	        'position' => 'adiministrativo',
	        'birth_date' => '16-05-1987',
	        'admission_date' => '2014',
	        'email' => 'rafaecheverria@live.cl',
	        'speciality_id' => '1',
	        'password' => bcrypt('26082008'),
	        'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 1000)->create();  
    }
}
