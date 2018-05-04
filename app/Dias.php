<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    protected $fillable = [
       'id','fecha_inicio', 'fecha_fin', 'title', 'color', 'observacion', 'doctor_id'
    ];

	public function users()
    {
        return $this->hasMany('App\User');
    }
    public static function dias_doctor($id, $fecha_inicio) 
    {
        $dias = Dias::where('doctor_id', '=', $id)->where('fecha_inicio', $fecha_inicio)->count();
       	if ($dias > 0) {return true;}else{return false;}
    }

    public static function rango_horas($id, $fecha_inicio, $fecha_fin) 
    {
        $horas = Dias::where('doctor_id', '=', $id)->whereBetween('fecha_inicio', array($fecha_inicio,$fecha_fin))->count();
        if ($horas > 0) {return true;}else{return false;}
    }


}
