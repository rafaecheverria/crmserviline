<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\Role::class)->create([
	        'name' 		   => 'administrador',
	        'display_name' => 'Adminsitrador',
        ]);
        factory(App\Role::class)->create([
	        'name' 		   => 'doctor',
	        'display_name' => 'Doctor',
        ]);
        factory(App\Role::class)->create([
	        'name'		   => 'recepcionista',
	        'display_name' => 'Recepcionista',
        ]);
        factory(App\Role::class)->create([
	        'name'		   => 'paciente',
	        'display_name' => 'Paciente',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
