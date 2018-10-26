<?php

namespace App\Http\Controllers\Estado_Organizacion;

use App\Organizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Estado_OrganizacionController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            //$organizacion = Organizacion::obtener_organizacion($request->organizacion_id); 
            Organizacion::insertar_nota_organizacion_estado($request->organizacion_id, $request->estado_id, $request->nota);
            $historial_estados = Organizacion::obtener_historial_estados($request->organizacion_id);
            $estado_actual = Organizacion::estado_actual($request->organizacion_id);
                foreach($estado_actual as $v){
                    $id_estado = $v->id;
                    $estado[] = $v->estado; 
                    $color[] = $v->color;
                }

           
            return response()->json([
              "message" => "La nota de agrego a la empresa !",
              "historial_estados" => $historial_estados, //agrupar
              "estado_actual" => $id_estado,
              "estado" => $estado,
              "color" => $color,
              "organizacion_id" => $request->organizacion_id,

            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
