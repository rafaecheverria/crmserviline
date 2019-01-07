<?php

namespace App\Http\Controllers\Contacto;

use App\Cargo;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CargosController extends Controller

{
    public function store(Request $request)

    {

        if($request->ajax()){

            $cargo = new Cargo();

            $cargo->nombre = $request->nombre;

            $cargo->save();

            $cargos = Cargo::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

            $my_cargo = $cargo->id;

            return response()->json([

                "message"=> "El cargo ".$cargo->nombre." ha sido registrado con éxito!",

                "cargos" => $cargos,

                "my_cargo" => $my_cargo

            ]); 

        }

    }

}
