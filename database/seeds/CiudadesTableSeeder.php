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
          'id' => 1,
	        'nombre' => 'Arica',
	        'regiones_id' => 15,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 2,
	        'nombre' => 'Iquique',
	        'regiones_id' => 1,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 3,
	        'nombre' => 'Antofagasta',
	        'regiones_id' => 2,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 4,
	        'nombre' => 'La Serena',
	        'regiones_id' => 4,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 5,
	        'nombre' => 'Valparaiso',
	        'regiones_id' => 5,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 6,
	        'nombre' => 'Viña del Mar',
	        'regiones_id' => 5,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 7,
	        'nombre' => 'Rancagua',
	        'regiones_id' => 6,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 8,
	        'nombre' => 'Talca',
	        'regiones_id' => 7,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 9,
	        'nombre' => 'Concepción',
	        'regiones_id' => 8,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 10,
	        'nombre' => 'Chillán',
	        'regiones_id' => 16,
        ]);

       factory(App\Ciudad::class)->create([
          'id' => 11,
	        'nombre' => 'Temuco',
	        'regiones_id' => 9,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 12,
	        'nombre' => 'Villarrica',
	        'regiones_id' => 9,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 13,
	        'nombre' => 'Osorno',
	        'regiones_id' => 10,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 14,
	        'nombre' => 'Coyhaique',
	        'regiones_id' => 11,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 15,
	        'nombre' => 'Punta Arenas',
	        'regiones_id' => 12,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 16,
	        'nombre' => 'Santiago',
	        'regiones_id' => 13,
        ]);
       factory(App\Ciudad::class)->create([
          'id' => 17,
          'nombre' => 'San Carlos',
          'regiones_id' => 16,
        ]);
    }
}
