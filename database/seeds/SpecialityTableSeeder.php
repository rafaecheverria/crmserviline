<?php

use Illuminate\Database\Seeder;

class SpecialityTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\Speciality::class)->create([
	        'nombre' => 'Cardiologia',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Cirugia General',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Cirugia Infantil',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Dermatologia',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Geriatria',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Pediatria',
        ]);
        factory(App\Speciality::class)->create([
	        'nombre' => 'Psicologia',
        ]);
        //factory(App\Speciality::class, 3)->create();  
    }
}
