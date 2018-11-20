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
    	$prospecto = Organizacion::obtener_organizacion_segun_estado(1);
    	$contactado = Organizacion::obtener_organizacion_segun_estado(2);
    	$reunion = Organizacion::obtener_organizacion_segun_estado(3);
    	$propuesta = Organizacion::obtener_organizacion_segun_estado(4);
    	$negociacion = Organizacion::obtener_organizacion_segun_estado(5);
    	$cierre = Organizacion::obtener_organizacion_segun_estado(6);
        return view('crm_panel.index', compact($prospecto, $contactado, $reunion, $propuesta, $negociacion, $cierre));
        dd($prospecto, $contactado);
    	//$prospecto = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('estados', function ($query) {
               //$query->where('estado_organizacion.estado_id', '=', 2);
               // })->get();
        //return view('crm_panel.index', compact($prospecto));
    }
}