<?php

namespace App\Http\Controllers\Panel;

use App\Organizacion;
use App\User;
use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelesController extends Controller
{
    public function index(Organizacion $organizacion){
      $prospectos = $organizacion->select(["id", "nombre"])->where("estado_actual", 1)->get();
      $contactados = $organizacion->select(["id", "nombre"])->where("estado_actual", 2)->get();
      $reuniones = $organizacion->select(["id", "nombre"])->where("estado_actual", 3)->get();
      $propuestas = $organizacion->select(["id", "nombre"])->where("estado_actual", 4)->get();
      $negociciones = $organizacion->select(["id", "nombre"])->where("estado_actual", 5)->get();

      return view('crm_panel.index', compact('prospectos', 'contactados', 'reuniones', 'propuestas', 'negociciones'));
    }
}