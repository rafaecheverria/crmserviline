<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model

{
	protected $table = "categorias";

    protected $fillable = [

        'id', 'categoria'

    ];

    public function setCategoriaAttribute($valor)

    {

        $this->attributes['categoria'] = ucwords($valor);

    }

    public static function obtener_categoria($id){

        $categoria = Categoria::findOrFail($id);

        return $categoria;

    }

    public static function obtener_categorias(){

        $categorias = Categoria::select(['id', 'categoria'])->orderBy('categoria', 'asc')->get();

        return $categorias;

    }

}
