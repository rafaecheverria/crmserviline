<?php

namespace App\Http\Controllers\Panel;

use App\Organizacion;
use App\User;
use App\Estado;
use App\Cargo;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelesController extends Controller
{
    public function index(){

       $regiones = Region::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

       $vendedores = User::select(['id', 'nombres', 'apellidos'])->withRole("vendedor")->orderBy('nombres', 'asc')->get();

       $contactos = User::select(['id', 'nombres', 'apellidos'])->withRole("contacto")->orderBy('apellidos', 'asc')->get();

       $cargos = Cargo::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

       $prospectos = Organizacion::obtener_organizaciones_crm(1);

       $contactados = Organizacion::obtener_organizaciones_crm(2);

       $reuniones = Organizacion::obtener_organizaciones_crm(3);

       $propuestas = Organizacion::obtener_organizaciones_crm(4);

       $negociaciones = Organizacion::obtener_organizaciones_crm(5);

     	return view('crm_panel.index', compact('prospectos', 'contactados', 'reuniones', 'propuestas', 'negociaciones', 'regiones', 'vendedores', 'contactos', 'cargos'));

    }
    
}