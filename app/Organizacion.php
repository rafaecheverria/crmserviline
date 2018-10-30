<?php

namespace App;

use Jenssegers\Date\Date;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $table = "organizaciones";
	 protected $fillable = [
        'id', 'nombre', 'email', 'rut', 'telefono', 'direccion', 'actividad', 'descripcion', 'estado', 'logo', 'tipo', 'ciudad_id', 'region_id', 'vendedor_id'
    ];
	
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function estados()
    {
        return $this->belongsToMany('App\Estado', 'estado_organizacion', 'organizacion_id','estado_id')->withPivot('nota', 'fecha_creado', 'fecha_actualizado');
    }
    public function setNombreAttribute($valor)
    {
        $this->attributes['nombre'] = ucwords($valor);
    }
    public function getUpdatedAttribute()
    {
        //return Date::parse($this->updated_at)->toDayDateTimeString();
        return Date::parse($this->updated_at)->format('j F Y');
        
    }

    public static function obtener_organizacion($id){
        $organizacion = Organizacion::findOrFail($id);
        return $organizacion;
    }

    public static function obtener_historial_estados($id){
         $organizacion = Organizacion::findOrFail($id);
         $historial_estados = $organizacion->estados()
         ->join('estados as est', 'estado_organizacion.estado_id', '=', 'est.id')
         ->select('estado_organizacion.id as id','estado_organizacion.estado_id', 'est.estado', 'est.color', 'estado_organizacion.organizacion_id as organizacion_id', 'estado_organizacion.nota','estado_organizacion.fecha_creado','estado_organizacion.fecha_actualizado')->orderBy('estado_organizacion.fecha_actualizado', 'DESC')->get();

        $agrupar = $historial_estados->mapToGroups(function ($item, $key) {
            return [$item['estado'] => [$item['id'], $item['organizacion_id'], $item['estado_id'], $item['estado'], $item['nota'], Date::parse($item['fecha_creado'])->format('j F Y'), Date::parse($item['fecha_actualizado'])->format('j F Y'), $item['color']]];
        });
        return $agrupar->toArray();
    }
    public static function estado_actual($id){
        $organizacion = Organizacion::findOrFail($id);
        $estado_actual = $organizacion->estados()->orderBy('fecha_creado', 'DESC')->take(1)->get(); //obtiene el estado actual (ultimo registro segun fecha
        return $estado_actual;
    }

    public static function insertar_nota_organizacion_estado($organizacion_id, $estado_id, $nota){
        $organizacion = Organizacion::findOrFail($organizacion_id);
        $insertar_nota = $organizacion->estados()->attach($estado_id,['nota'=>$nota, 'fecha_creado' => now(), 'fecha_actualizado' => now()]);
        return $insertar_nota;
    }
    public static function actualizar_nota_organizacion_estado($id, $nota){
       $update = DB::table('estado_organizacion')->where('id', $id)->update(['nota' => $nota]);
        return $update;
    }


    public static function obtener_un_estado_organizacion($id){
        $estado_organizacion = DB::table("estado_organizacion")->select("estado_organizacion.id", "estado_organizacion.nota")->where("id", "=", $id)->get();
        return $estado_organizacion;
    }
}
