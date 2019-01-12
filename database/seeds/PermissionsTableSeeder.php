<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Permission::class)->create([
            'name' => 'crear-permisos',
        ]);

        factory(App\Permission::class)->create([
            'name' => 'crear-vendedores',
        ]);

        factory(App\Permission::class)->create([
            'name' => 'crear-contactos',
        ]);

        factory(App\Permission::class)->create([
            'name' => 'crear-personas',
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
            'name' => 'editar-vendedores',
        ]);

        factory(App\Permission::class)->create([
            'name' => 'editar-contactos',
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

        factory(App\Permission::class)->create([
            'name' => 'leer-vendedores',
        ]);

        //factory(App\Role::class, 4)->create();
    }
}
