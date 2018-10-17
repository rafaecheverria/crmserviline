<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
    	factory(App\Role::class)->create([
	        'name' 		   => 'administrador',
        ]);
        factory(App\Role::class)->create([
            'name'         => 'vendedor',
        ]);
        factory(App\Role::class)->create([
            'name'         => 'contacto',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
