<?php

use Illuminate\Database\Seeder;

class OrganizacionTableSeeder extends Seeder
{
    public function run()
    {
       /*factory(App\Organizacion::class, 20)->create()->each(function(App\Organizacion $organizacion){
    			$organizacion->estados()->attach([
    				rand(1,7),
    			]);
    		});
*/
       App\Organizacion::create([
       	'nombre' => 'serviline limitada',
        'rut' => '79365987-8',
        'direccion' => 'brasil 645',
        'telefono' => '+56958475965',
        'giro' => 'empresa de publicidad',
        'tipo' => 'pequena',
        'email' => 'contacto@serviline.cl',
        'vendedor_id' => 1,
        'region_id' => 16,
        'ciudad_id' => 17,
       ]);
    }
}
