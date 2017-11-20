<?php

use Illuminate\Database\Seeder;

class SpecialityTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\Speciality::class)->create([
	        'name' => 'Cardiología',
        ]);
        factory(App\Speciality::class)->create([
	        'name' => 'Cirugía General',
        ]);
        factory(App\Speciality::class)->create([
	        'name' => 'Cirugía Infantil',
        ]);
        factory(App\Speciality::class)->create([
	        'name' => 'Dermatología',
        ]);
        factory(App\Speciality::class)->create([
	        'name' => 'Geriatría',
        ]);
        factory(App\Speciality::class)->create([
	        'name' => 'Pediatría',
        ]);
        factory(App\Speciality::class)->create([
	        'name' => 'Psicología',
        ]);
        //factory(App\Speciality::class, 3)->create();  
    }
}
