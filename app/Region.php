<?php

namespace App;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regiones";

    protected $fillable = [
        'id', 'nombre'
    ];

    /*public static function regiones($id) //obtiene las especialidades del doctor en session.
    {
        $regiones = Ciudad::findOrFail($id)->ciudades; //lista las especialidades del doctor en sesión.
        return $regiones;
    }*/

    public function ciudades()

    {

        return $this->belongsToMany('App\Ciudad');

    }

    public static function obtener_regiones(){

        $regiones = Region::select(['id', 'nombre'])->orderBy('id', 'desc')->get();

        return $regiones;

    }

}
