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

    public function cambiar_estado(Request $request, $id)
    {
        if($request->ajax()){
        Organizacion::insertar_nota_organizacion_estado($id, $request->estado_id, $request->nota);
        return response()->json([
              "message" => "Se ha realizado el cambio de estado",
              "id" => $request->id,
              "estado" => $request->estado_id,
              "nota" => $request->nota,
            ]);
        }
    }

    public function get_estados_segun_actual($organizacion_id){
        $obtener_estados_segun_actual = Organizacion::obtener_estados_segun_actual($organizacion_id)->toArray();
        $estado_actual = Organizacion::estado_actual($organizacion_id);
        foreach($estado_actual as $v){
                    $estado_id = $v->id; 
                }
            return response()->json([
              "estados" => array_values($obtener_estados_segun_actual),
              "estado_id" => $estado_id,
            ]);
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
            Organizacion::actualizar_nota_organizacion_estado($id, $request->nota);
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

    public function destroy(Request $request, $id)
    {
        Organizacion::eliminar_nota_organizacion_estado($id);
        $historial_estados = Organizacion::obtener_historial_estados($request->organizacion_id);
        $estado_actual = Organizacion::estado_actual($request->organizacion_id);
        foreach($estado_actual as $v){
                    $id_estado = $v->id;
                    $estado[]  = $v->estado; 
                    $color[]   = $v->color;
                }
        return response()->json([
          "message" => "La nota se eliminó correctamente !",
          "organizacion_id"   => $request->organizacion_id,
          "historial_estados" => $historial_estados, //agrupar
          "estado_actual"     => $id_estado,
          "estado"            => $estado,
          "color"             => $color,

        ]);
        
    }
}
