<?php

namespace App\Http\Controllers\Permisos;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("permisos.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        if($request->ajax()){
            $permiso = new Permission();
            $permiso->name = $request->name;
            $permiso->save();
            return response()->json([
                "message" => "El permiso ".$permiso->name." ha sido guardado exitosamente !"
                ]);
        }
    }

    public function show()
    {
        $permisos = Permission::select(['id','name']);
        return datatables()->eloquent($permisos)
            ->addColumn('action', function ($permiso) {
                $editar ='<a href="#" onclick="carga_permiso('.$permiso->id.')" data-toggle="modal" data-target="#modal_editar_permiso" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                $eliminar ='<a href="#" onclick="delete_permiso('.$permiso->id.')"  data-toggle="modal" data-target="#eliminar_permiso" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';

                     return $editar.$eliminar;
            })
            ->make(true);
    }

    public function edit($id)
    {
       $permiso = Permission::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $permiso->id,
            'nombre'      => $permiso->name,
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $permiso = Permission::findOrFail($id);
            $permiso->name = $request->name_e;
            $permiso->save();
            return response()->json([
             "message" => "El permiso ".$permiso->name." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Permission::findOrFail($id)->roles->count();
        if ($query > 0){
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero el permiso que desea eliminar esta asignado a un rol!",
                "type"    => 'warning'
            ]);
        }else{
            $permiso = Permission::findOrFail($id);
            Permission::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "El permiso ".$permiso->name." han sido eliminado correctamente !",
                "type"    => 'success'

            ]);
        }
    }
}
