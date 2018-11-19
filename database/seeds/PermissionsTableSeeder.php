<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Permission::class)->create([
	        'name' => 'crear-citas',
        ]);
        factory(App\Permission::class)->create([
	        'name' => 'crear-clinicas',
        ]);
        factory(App\Permission::class)->create([
	        'name' => 'crear-consultas',
        ]);
        factory(App\Permission::class)->create([
	        'name' => 'crear-doctores',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'crear-especialidades',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'crear-pacientes',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'crear-permisos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'crear-personas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'crear-recepcionistas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'crear-roles',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-permisos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-personas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-permisos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-personas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-roles',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-configuraciones',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-mantenimientos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-permisos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-personas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-roles',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-empresas',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
