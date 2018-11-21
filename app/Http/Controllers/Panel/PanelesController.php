<?php

namespace App\Http\Controllers\Panel;

use App\Organizacion;
use App\User;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelesController extends Controller
{
    public function index()
    {
    	//$prospectos = Organizacion::obtener_organizacion_segun_estado()->whereHas('estados', function ($query) {
            //$query->where('estado_organizacion.estado_id', '=', 1)->orderBy('fecha_creado', 'desc');
        //})->get();

        $prospectos = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
               $query->where('estado_organizacion.estado_id', '=', 1)->orderBy('fecha_creado', 'DESC');
                })->get();

        $contactados = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
               $query->where('estado_organizacion.estado_id', '=', 2)->orderBy('fecha_creado', 'DESC');
                })->distinct()->get();

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
        dd($prospectos->last());
        //dd($contactados->toArray());
    	//$prospecto = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
               //$query->where('estado_organizacion.estado_id', '=', 2);
               // })->get();
        //return view('crm_panel.index', compact($prospecto));
    }
}