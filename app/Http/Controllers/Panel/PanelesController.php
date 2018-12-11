<?php

namespace App\Http\Controllers\Panel;

use App\Organizacion;
use App\User;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelesController extends Controller
{
    public function index(){
       $prospectos = Organizacion::obtener_organizaciones_crm(1);
       $contactados = Organizacion::obtener_organizaciones_crm(2);
       $reuniones = Organizacion::obtener_organizaciones_crm(3);
       $propuestas = Organizacion::obtener_organizaciones_crm(4);
       $negociaciones = Organizacion::obtener_organizaciones_crm(5);

      return view('crm_panel.index', compact('prospectos', 'contactados', 'reuniones', 'propuestas', 'negociaciones'));
    }
}