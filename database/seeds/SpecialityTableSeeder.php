<?php

use Illuminate\Database\Seeder;

class SpecialityTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\Speciality::class)->create([
	        'nombre' => 'Cardiología',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Cirugía General',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Cirugía Infantil',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Dermatología',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Geriatría',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Pediatría',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Psicología',
        ]);
        //factory(App\Speciality::class, 3)->create();  
    }
}
