<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Permission::class)->create([
	        'name' => 'create_users',
        ]);
        factory(App\Permission::class)->create([
	        'name' => 'edit_users',
        ]);
        factory(App\Permission::class)->create([
	        'name' => 'delete_users',
        ]);
        factory(App\Permission::class)->create([
	        'name' => 'read_users',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
