<?php

namespace App;

use Jenssegers\Date\Date;
use DB;
use App\Estado;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $table = "organizaciones";

	 protected $fillable = [

        'id', 'nombre', 'email', 'rut', 'telefono', 'direccion', 'actividad', 'descripcion', 'logo', 'tipo', 'ciudad_id', 'region_id', 'vendedor_id', 'fecha_actualizado'

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

        return Date::parse($this->updated_at)->format('j F Y');   

    }

    public static function obtener_organizacion($id){

        $organizacion = Organizacion::findOrFail($id);

        return $organizacion;
    }

    public static function obtener_organizacion_segun_estado(){

        $empresa = Organizacion::with('estados')->selectRaw('distinct organizaciones.*');

        return $empresa;
    }

    public static function obtener_tipo_persona($organizacion_id, $tipo){

        $organizacion = Organizacion::obtener_organizacion($organizacion_id);

        $datos = $organizacion->users()->where("organizacion_id" ,$organizacion->id)->where("tipo", $tipo)->get();

        $tipo_persona = $datos->map(function($item, $key){

            return [$item['nombres'] => [$item['id'], $item['nombres'], $item['apellidos']]];

         });

        return $tipo_persona;

    }

    public static function traer_datos_estado_organizacion($organizacion){

        $estado_organizacion = $organizacion->estados()

            ->join('estados as est', 'estado_organizacion.estado_id', '=', 'est.id')

            ->join('organizaciones as org', 'estado_organizacion.organizacion_id', '=', 'org.id')

            ->select('estado_organizacion.id as id','estado_organizacion.estado_id', 'org.nombre', 'est.estado', 'est.color', 'estado_organizacion.organizacion_id as organizacion_id', 'estado_organizacion.nota','estado_organizacion.fecha_creado','estado_organizacion.fecha_actualizado')->orderBy('estado_organizacion.fecha_creado', 'DESC');

        return $estado_organizacion;

    }

    public static function obtener_historial_estados($id){

         $organizacion = Organizacion::findOrFail($id);

         $historial_estados = Organizacion::traer_datos_estado_organizacion($organizacion)->get();

         $datos = $historial_estados->map(function($item, $key){

            return [$item['estado'] => [$item['id'],$item['estado'], Date::parse($item['fecha_creado'])->format('j F Y'), $item['color'], $item['organizacion_id'], $item['estado_id'], $item['nota'], $item['organizacion_id'], Date::parse($item['fecha_creado'])->format('H:i')]];

         });

         return $datos;
/*==========================================================================================================
          INICIA CÓDIGO QUE AGRUPA EL ARRAY POR SUS ESTADOS CON LA FUNCION mapToGroups()
============================================================================================================*/
       // $agrupar = $historial_estados->mapToGroups(function ($item, $key) {
            //return [$item['estado'] => [$item['id'], $item['organizacion_id'], $item['estado_id'], $item['estado'], $item['nota'], Date::parse($item['fecha_creado'])->format('j F Y'), Date::parse($item['fecha_actualizado'])->format('j F Y'), $item['color']]];
        //});
        //return $agrupar->toArray();
         //return $historial_estados;
/*==========================================================================================================
           FIN DE CÓDIGO QUE AGRUPA EL ARRAY POR SUS ESTADOS CON LA FUNCION mapToGroups()
============================================================================================================*/
    }

    public static function insertar_fecha_actualizacion($id){

        $organizacion = DB::table('organizaciones')->where('id', $id)->update(['fecha_actualizado' => Carbon::now()]);

    }

    public function fecha_actualizado_difference()

      {

           return Carbon::createFromTimestamp(strtotime($this->fecha_actualizado))->diff(Carbon::now())->days;

      }

    public static function obtener_organizaciones_crm($estado_id){

        $organizacion = Organizacion::select(["id", "nombre", "fecha_actualizado", "estado_actual"])->orderBy("fecha_actualizado", "DESC")->where("estado_actual", "=", $estado_id)->get();

        return $organizacion;

    }

    public static function estado_actual($id){

        $organizacion = Organizacion::findOrFail($id);

        $estado_actual = $organizacion->estados()->orderBy('fecha_creado', 'DESC')->take(1)->get(); //obtiene el estado actual (ultimo registro segun fecha

        return $estado_actual;

    }

    public static function insertar_nota_organizacion_estado($organizacion_id, $estado_id, $nota){

        $organizacion = Organizacion::findOrFail($organizacion_id);

        $organizacion->estado_actual = $estado_id;

        $organizacion->save();

        $insertar_nota = $organizacion->estados()->attach($estado_id,['nota'=>$nota, 'fecha_creado' => Carbon::now(), 'fecha_actualizado' => Carbon::now()]);

        return $insertar_nota;

    }

    public static function obtener_estados_segun_actual($organizacion_id){

        $estado_actual = Organizacion::estado_actual($organizacion_id);

        foreach($estado_actual as $v){

                    $id_estado = $v->id;

                }

        $estados = Estado::where("id", ">", $id_estado)->where("id", "<", 7)->get();

        return $estados;

    }

    public static function actualizar_nota_organizacion_estado($id, $nota){

       $update = DB::table('estado_organizacion')->where('id', $id)->update(['nota' => $nota]);

        return $update;

    }

    public static function eliminar_nota_organizacion_estado($id){

       $delete = DB::table('estado_organizacion')->where('id', $id)->delete();

       return $delete;

    }

    public static function obtener_un_estado_organizacion($id){

        $estado_organizacion = DB::table("estado_organizacion")->select("estado_organizacion.id", "estado_organizacion.nota")->where("id", "=", $id)->get();

        return $estado_organizacion;

    }

    public static function obtener_empresas(){

        $empresas = Organizacion::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

        return $empresas;

    }

}
