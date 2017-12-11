<?php

use Illuminate\Database\Seeder;

class UnitiesTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Unity::class)->create([
	        'nombre' => 'Medilab',
        ]);
        factory(App\Unity::class)->create([
	        'nombre' => 'Clínica Chillán',
        ]);
        //factory(App\Role::class, 4)->create();
    }
}
