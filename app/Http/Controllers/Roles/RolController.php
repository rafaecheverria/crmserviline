<?php

namespace App\Http\Controllers\Roles;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    public function index()
    {
        return view("roles.index");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $rol = new Role();
            $rol->name = $request->name;
            $rol->save();
            return response()->json([
                "message" => "El rol ".$rol->name." ha sido guardado exitosamente !"
                ]);
        }
    }

    public function show()
    {
        $roles = Role::select(['id','name']);
        return datatables()->eloquent($roles)
        ->editColumn('name', function ($rol) {
                return ucwords($rol->name);
            })
            ->addColumn('action', function ($rol) {
                $permisos ='<a href="#" onclick="permisos_roles('.$rol->id.')" data-toggle="modal" data-target="#modal_permisos" rel="tooltip" title="Permisos" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">lock_outline</i></a>';
                $editar ='<a href="#" onclick="carga_rol('.$rol->id.')" data-toggle="modal" data-target="#modal_editar_rol" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                $eliminar ='<a href="#" onclick="delete_rol('.$rol->id.')"  data-toggle="modal" data-target="#eliminar_rol" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';

                     return $permisos.$editar.$eliminar;
            })
            ->make(true);
    }

    public function edit($id)
    {
       $rol = Role::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $rol->id,
            'nombre'      => $rol->name,
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $rol = Role::findOrFail($id);
            $rol->name = $request->name_e;
            $rol->save();
            return response()->json([
             "message" => "El rol ".$rol->name." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Role::findOrFail($id)->users->count();
        if ($query > 0){
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero el rol que desea eliminar esta asignado a un permiso o persona!",
                "type"    => 'warning'
            ]);
        }else{
            $rol = Role::findOrFail($id);
            Role::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "El rol ".$rol->name." han sido eliminado correctamente !",
                "type"    => 'success'

            ]);
        }
    }
}
