<?php

use Illuminate\Database\Seeder;

class RegionesTableSeeder extends Seeder
{
    public function run()
    {
       factory(\App\Region::class)->create([
	        'nombre' => 'XV Arica y Parinacota',
        ]);
        factory(App\Region::class)->create([
	        'nombre' => 'I de Tarapacá',
        ]);
        factory(App\Region::class)->create([
	        'nombre' => 'II de Antofagasta',
        ]);
        factory(App\Region::class)->create([
	        'nombre' => 'III de Atacama',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'IV de Coquimbo',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'V de Valparaíso',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'VI del Libertador General Bernardo OHiggins',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'VII del Maule',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'VIII del Bío Bío',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'IX de la Araucanía',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'XIV de los Ríos',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'XI Aisén del General Carlos Ibáñez del Campo',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'XII de Magallanes y Antártica Chilena',
        ]);
        factory(App\Region::class)->create([
            'nombre' => 'Metropolitana de Santiago',
        ]);
    }
}
