<?php

namespace App\Http\Controllers\Categoria;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{

    public function index()

    {

        return view('categorias.index');

    }


     public function store(Request $request)

    {

        if($request->ajax()){

            $categoria = new Categoria();

            $categoria->categoria = $request->categoria;

            $categoria->save();

            return response()->json([

                "message"    => "La categoria ".$categoria->categoria." se agregó exitosamente",

            ]);

        }

    }


    public function show()
    {

        $categorias = Categoria::selectRaw('distinct categorias.*');

        return  datatables()->of($categorias)

            ->addColumn('action', function ($categoria) {

                $ruta = "categorias/";

                $editar = '<a href="#" onclick="mostrar_categoria('.$categoria->id.')" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';

                $eliminar = '<a href="#" onclick="eliminar('.$categoria->id.',\''.$categoria->categoria.'\',\''.$ruta.'\')" rel="tooltip" title="eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                return $editar.$eliminar;
               
            })->make(true);

    }

    public function edit(Request $request, $id)

    {
        if($request->ajax()) {

            $categoria = Categoria::obtener_categoria($id);

            return response()->json([

                'success'     => true,

                'id'          => $categoria->id,

                'categoria'   => $categoria->categoria

            ]);

        }

    }

    public function update(Request $request, $id)

    {

        if($request->ajax()){

            $categoria = Categoria::obtener_categoria($id);

            $categoria->categoria = $request->categoria;

            $categoria->save();

            return response()->json([

             "message" => "La categoria ".$categoria->categoria." ha sido actualizado correctamente!"

            ]);

        }

    }

     public function destroy($id)

    {

       $categoria = Categoria::obtener_categoria($id);

        Categoria::destroy($id);

        return response()->json([

            'success' => true,

            "message" => "La categoria ".$categoria->categoria." se ha eliminado correctamente.",

        ]);

    }

}

