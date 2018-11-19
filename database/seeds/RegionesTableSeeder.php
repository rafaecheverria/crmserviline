<?php

use Illuminate\Database\Seeder;

class RegionesTableSeeder extends Seeder
{
    public function run()
    {
       
        factory(App\Region::class)->create([
            'id' => 1,
	        'nombre' => 'I de Tarapacá',
        ]);
        factory(App\Region::class)->create([
            'id' => 2,
	        'nombre' => 'II de Antofagasta',
        ]);
        factory(App\Region::class)->create([
            'id' => 3,
	        'nombre' => 'III de Atacama',
        ]);
        factory(App\Region::class)->create([
            'id' => 4,
            'nombre' => 'IV de Coquimbo',
        ]);
        factory(App\Region::class)->create([
            'id' => 5,
            'nombre' => 'V de Valparaíso',
        ]);
        factory(App\Region::class)->create([
            'id' => 6,
            'nombre' => 'VI del Libertador General Bernardo OHiggins',
        ]);
        factory(App\Region::class)->create([
            'id' => 7,
            'nombre' => 'VII del Maule',
        ]);
        factory(App\Region::class)->create([
            'id' => 8,
            'nombre' => 'VIII del Bío Bío',
        ]);
        factory(App\Region::class)->create([
            'id' => 9,
            'nombre' => 'IX de la Araucanía',
        ]);
        factory(App\Region::class)->create([
            'id' => 10,
            'nombre' => 'X Los Lagos',
        ]);
        factory(App\Region::class)->create([
            'id' => 11,
            'nombre' => 'XI Aisén del General Carlos Ibáñez del Campo',
        ]);
        factory(App\Region::class)->create([
            'id' => 12,
            'nombre' => 'XII de Magallanes y Antártica Chilena',
        ]);
        factory(App\Region::class)->create([
            'id' => 13,
            'nombre' => 'Metropolitana de Santiago',
        ]);
        factory(App\Region::class)->create([
            'id' => 14,
            'nombre' => 'XIV de los Ríos',
        ]);
        
        factory(App\Region::class)->create([
            'id' => 15,
            'nombre' => 'XV Arica y Parinacota',
        ]);
        
        factory(\App\Region::class)->create([
            'id' => 16,
            'nombre' => 'XVI Ñuble',
        ]);

        
    }
}
