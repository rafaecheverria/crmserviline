<?php

namespace App;

use App\Region;
use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";
    protected $fillable = [
        'id', 'nombre', 'regiones_id'
    ];

    /*public static function regiones($id) //obtiene los doctores en los select de agregar y editar cita que estan ligados a una especialidad
    {
        $ciudades = Region::findOrFail($id)->ciudades; //lista los usuarios que tinen el id de la especialidad que recibe como parametro
        return $ciudades;
    }*/

	public static function ciudades($id) //obtiene los doctores en los select de agregar y editar cita que estan ligados a una especialidad
    {
        $ciudades = Ciudad::where('regiones_id', '=', $id)->get(); //lista las ciudades que tinen el id de la especialidad que recibe como parametro
        return $ciudades;
    }

}
