<?php

namespace App\Http\Controllers\Producto;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{

    public function crearCodigoProducto($categoria_id){

        $productos = Producto::obtener_ultimo_producto($categoria_id);

         return response()->json($productos);

    }

    public function index()

    {

        $categorias = Categoria::obtener_categorias();

        return view('productos.index', compact('categorias'));

    }

    public function store(Request $request)

    {

        if($request->ajax()){

            $producto = new Producto();

            $producto->descripcion = $request->descripcion;

            $producto->save();

            return response()->json([

                "message"    => "El producto ".$producto->descripcion." se agregó exitosamente",

            ]);

        }

    }

    public function show()
    {

        $productos = Producto::join("categorias", "productos.categoria_id", "=", "categorias.id")->select(["productos.id", "productos.imagen", "productos.descripcion", "productos.stock", "productos.precio_venta", "productos.precio_compra", "categorias.categoria", "productos.codigo", "productos.ventas", "productos.created_at"])->get();

        return  datatables()->of($productos)

        /*->editColumn('imagen', function ($producto) {
                return '<img src="'.$producto->imagen.'" class="img-circle imagen_table"/>';
            })*/

            ->addColumn('action', function ($producto) {

                $ruta = "productos/";

                $editar = '<a href="#" onclick="mostrar_producto('.$producto->id.')" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';

                $eliminar = '<a href="#" onclick="eliminar('.$producto->id.',\''.$producto->producto.'\',\''.$ruta.'\')" rel="tooltip" title="eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                return $editar.$eliminar;

               })

            ->rawColumns(['action'])

            ->make(true);

    }

    public function edit(Request $request, $id)

    {
        if($request->ajax()) {

            $producto = Producto::obtener_producto($id);

            return response()->json([

                'success'     => true,

                'id'          => $producto->id,

                'producto'   => $producto->descripcion

            ]);

        }

    }

    public function update(Request $request, $id)

    {

        if($request->ajax()){

            $producto = Producto::obtener_producto($id);

            $producto->descripcion = $request->descripcion;

            $producto->save();

            return response()->json([

             "message" => "El producto ".$producto->descripcion." ha sido actualizado correctamente!"

            ]);

        }

    }

    public function destroy($id)

    {

       $producto = Producto::obtener_producto($id);

        Producto::destroy($id);

        return response()->json([

            'success' => true,

            "message" => "El producto ".$producto->descripcion." se ha eliminado correctamente.",

        ]);

    }

}
