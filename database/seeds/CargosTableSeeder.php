<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Cargo::class)->create([
	        'nombre' => 'Encargado de Marketing',
        ]);
        factory(App\Cargo::class)->create([
	        'nombre' => 'Gerente General',
        ]);
    }
}
