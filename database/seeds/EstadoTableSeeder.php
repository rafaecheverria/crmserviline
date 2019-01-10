<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Estado::class)->create([
	        'estado' => 'PROSPECTO',
            'color' => '#F44336',
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'CONTACTADO',
            'color' => '#FF9800',
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'REUNIÓN',
            'color' => '#00BCD4',
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'PROPUESTA',
            'color' => '#9C27B0',
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'NEGOCIACIÓN',
            'color' => '#4CAF50',
        ]);
        factory(App\Estado::class)->create([
	        'estado' => 'VIGENTE',
            'color' => '#00BCD4',
        ]);
        factory(App\Estado::class)->create([
            'estado' => 'DE BAJA',
            'color' => '#F44336',
        ]);
    }
}
