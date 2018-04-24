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
            'name' => 'editar-atender',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-citas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-clinicas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-consultas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-doctores',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-especialidades',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-pacientes',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-permisos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-personas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-recepsionistas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'editar-roles',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-citas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-clinicas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-consultas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-doctores',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-especialidades',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'eliminar-pacientes',
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
            'name' => 'leer-atender',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-citas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-clinicas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-configuraciones',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-consultas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-doctores',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-especialidades',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-mantenimientos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-pacientes',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-permisos',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-personas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-recepcionistas',
        ]);
        factory(App\Permission::class)->create([
            'name' => 'leer-roles',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
