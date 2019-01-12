<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargos";

    protected $fillable = [

        'id', 'nombre'

    ];

    public function users()

    {

        return $this->belongsTo('App\User');

    }

    public static function obtener_cargos(){

    	$cargos = Cargo::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

    	return $cargos;

    }

    public static function obtener_cargo_persona($cargo){

        $cargo = Cargo::where("id", $cargo)->get();

        return $cargo;
        
    }

}
