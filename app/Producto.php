<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = [

        'id', 'categoria_id', 'codigo', 'descripcion', 'imagen', 'stock', 'precio_compra', 'precio_venta', 'ventas'

    ];

    public function setDescripcionAttribute($valor)

    {

        $this->attributes['descripcion'] = ucwords($valor);

    }

    public static function obtener_producto($id){

        $producto = Producto::findOrFail($id);

        return $producto;

    }

    public static function obtener_ultimo_producto($categoria_id){

        $producto = Producto::where("categoria_id", $categoria_id)->orderBy('id', 'DESC')->take(1)->get();
        
        return $producto;

    }

    public static function obtener_productos(){

        $productos = Producto::select(['id', 'descripcion', 'codigo'])->get();

        return $productos;

    }

}
