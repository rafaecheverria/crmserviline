<?php

namespace App\Http\Controllers\Panel;

use App\Organizacion;
use App\User;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelesController extends Controller
{
    public function index(Organizacion $organizacion)
    {
    	//$prospectos = Organizacion::obtener_organizacion_segun_estado()->whereHas('estados', function ($query) {
            //$query->where('estado_organizacion.estado_id', '=', 1)->orderBy('fecha_creado', 'desc');
        //})->get();
        //$empresas2 = $organizacion->all()->count();
 
        $empresas = $organizacion
        ->join('estado_organizacion', 'estado_organizacion.organizacion_id', '=', 'organizaciones.id')
        ->join('estados as est', 'estado_organizacion.estado_id', '=', 'est.id')
        ->join('organizaciones as org', 'estado_organizacion.organizacion_id', '=', 'org.id')
        ->select('estado_organizacion.id as id','estado_organizacion.estado_id', 'org.nombre', 'est.estado', 'est.color', 'estado_organizacion.organizacion_id as organizacion_id', 'estado_organizacion.nota','estado_organizacion.fecha_creado','estado_organizacion.fecha_actualizado')->orderBy('estado_organizacion.fecha_creado', 'DESC')->get();

       
        $prospectos = $empresas->map(function($item, $key){
           if ($item["estado"] == "PROSPECTO") {
               return [$item['nombre'] => [$item['id'], $item['estado'], $item['nombre'], $item['color']]];
           }  
           /* if ($item["estado"] == "PROSPECTO" and $item["nombre"] == "After School") {
               return [$item['nombre'] => [$item['id'], $item['estado'], $item['nombre'], $item['color']]];
            }  */   
        });
        //return view('crm_panel.index', compact('prospectos'));
        dd($prospectos);

//El everymétodo puede usarse para verificar que todos los elementos de una colección pasen una prueba de verdad dada:

      /*  collect([1, 2, 3, 4])->every(function ($value, $key) {
            return $value > 2;
        });
*/
// false
          //El exceptmétodo devuelve todos los elementos de la colección, excepto aquellos con las claves especificadas:

       /* $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);

         $filtered = $collection->except(['price', 'discount']);

        $filtered->all();*/

        //$contactados = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
          //     $query->where('estado_organizacion.estado_id', '=', 2)->orderBy('fecha_creado', 'DESC');
            //    })->distinct()->get();

       // SELECCIONE TODAS LAS EMPRESAS QUE TENGAN EL ESTADO PROSPECTO 

        //$empresa2 = $empresa->estados;
        /*$prospectos = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
            $query->where('estado_organizacion.estado_id', '=', 1)->orderBy('fecha_creado', 'desc');
        })->distinct()->get();*/



    	/*$contactados = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
               $query->where('estado_organizacion.estado_id', '=', 2)->orderBy('fecha_creado', 'DESC');
                })->distinct()->get();*/

        //$estado_actual = $organizacion->estados()->orderBy('fecha_creado', 'DESC')->take(1)->get(); //obtiene el estado actual (ultimo registro segun fecha

    	//$reunion = Organizacion::obtener_organizacion_segun_estado(3);
    	//$propuesta = Organizacion::obtener_organizacion_segun_estado(4);
    	//$negociacion = Organizacion::obtener_organizacion_segun_estado(5);
    	//$cierre = Organizacion::obtener_organizacion_segun_estado(6);
        //return view('crm_panel.index', compact('prospectos', 'contactados'));
       // dd($prospectos);
        //dd($contactados->toArray());
    	//$prospecto = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
               //$query->where('estado_organizacion.estado_id', '=', 2);
               // })->get();
        //return view('crm_panel.index', compact($prospecto));
    }
}