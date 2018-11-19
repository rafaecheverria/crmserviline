<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Estado::class)->create([
	        'estado' => 'PROSPECTO',
            'color' => '#F44336',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'CONTACTADO',
            'color' => '#FF9800',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'REUNIÓN',
            'color' => '#00BCD4',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'PROPUESTA',
            'color' => '#9C27B0',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'NEGOCIACIÓN',
            'color' => '#4CAF50',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'CIERRE',
            'color' => '#00BCD4',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
        factory(App\Estado::class)->create([
            'estado' => 'DE BAJA',
            'color' => '#F44336',
            //'fecha_creado' => Carbon::now(),
            //'fecha_actualizado' => Carbon::now(),
        ]);
    }
}
