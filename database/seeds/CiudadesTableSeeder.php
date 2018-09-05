<?php

use Illuminate\Database\Seeder;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Arica',
	        'regiones_id' => 2,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Iquique',
	        'regiones_id' => 3,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Antofagasta',
	        'regiones_id' => 4,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'La Serena',
	        'regiones_id' => 5,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Valparaiso',
	        'regiones_id' => 6,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Viña del Mar',
	        'regiones_id' => 6,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Rancagua',
	        'regiones_id' => 14,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Talca',
	        'regiones_id' => 7,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Concepción',
	        'regiones_id' => 9,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Chillán',
	        'regiones_id' => 9,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Temuco',
	        'regiones_id' => 10,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Villarrica',
	        'regiones_id' => 10,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Osorno',
	        'regiones_id' => 11,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Coihaique',
	        'regiones_id' => 12,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Punta Arenas',
	        'regiones_id' => 13,
        ]);
       factory(App\Ciudad::class)->create([
	        'nombre' => 'Santiago',
	        'regiones_id' => 14,
        ]);
    }
}
