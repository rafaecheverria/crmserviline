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
            'name'         => 'vendedor',
            'display_name' => 'Vendedor',
        ]);
        factory(App\Role::class)->create([
            'name'         => 'contacto',
            'display_name' => 'Contacto',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
