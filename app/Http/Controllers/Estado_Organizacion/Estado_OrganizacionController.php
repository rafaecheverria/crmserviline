<?php

namespace App\Http\Controllers\Estado_Organizacion;

use App\Organizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Estado_OrganizacionController extends Controller
{
    public function store(Request $request)
    {
        if($request->ajax()){
            Organizacion::insertar_nota_organizacion_estado($request->organizacion_id, $request->estado_id, $request->nota);
            $historial_estados = Organizacion::obtener_historial_estados($request->organizacion_id);
            $estado_actual = Organizacion::estado_actual($request->organizacion_id);
                foreach($estado_actual as $v){
                    $id_estado = $v->id;
                    $estado[]  = $v->estado; 
                    $color[]   = $v->color;
                }
            return response()->json([
              "message" => "La nota de agrego correctamente !",
              "historial_estados" => $historial_estados, //agrupar
              "estado_actual"     => $id_estado,
              "estado"            => $estado,
              "color"             => $color,
              "organizacion_id"   => $request->organizacion_id,
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        
    }

    public function show(Request $request, $id)
    {
        if($request->ajax()) {
        $estado_organizacion = Organizacion::obtener_un_estado_organizacion($id);
        foreach($estado_organizacion as $v){
                    $id = $v->id;
                    $nota = $v->nota; 
                }
            return response()->json([
                'success' => true,
                'nota'    => $nota,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            $update = Organizacion::actualizar_nota_organizacion_estado($id, $request->nota);
            $historial_estados = Organizacion::obtener_historial_estados($request->organizacion_id);
            $estado_actual = Organizacion::estado_actual($request->organizacion_id);
                foreach($estado_actual as $v){
                    $id_estado = $v->id;
                    $estado[]  = $v->estado; 
                    $color[]   = $v->color;
                }
            return response()->json([
              "message" => "La nota se actualizó correctamente !",
              "historial_estados" => $historial_estados, //agrupar
              "estado_actual"     => $id_estado,
              "estado"            => $estado,
              "color"             => $color,
              "organizacion_id"   => $request->organizacion_id,
            ]);
        }
    }

    public function destroy($id)
    {
    
            Organizacion::eliminar_nota_organizacion_estado($id);
            //$historial_estados = Organizacion::obtener_historial_estados($request->organizacion_id);
            /*$estado_actual = Organizacion::estado_actual($request->organizacion_id);
                foreach($estado_actual as $v){
                    $id_estado = $v->id;
                    $estado[]  = $v->estado; 
                    $color[]   = $v->color;
                }*/
            return response()->json([
              "message" => "La nota se elimino correctamente !",
              /*"historial_estados" => $historial_estados, //agrupar
              "estado_actual"     => $id_estado,
              "estado"            => $estado,
              "color"             => $color,
              "organizacion_id"   => $request->organizacion_id,*/
            ]);
        
    }
}
