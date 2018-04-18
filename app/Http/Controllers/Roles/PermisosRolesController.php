<?php

namespace App\Http\Controllers\Roles;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermisosRolesController extends Controller
{
    public function edit(Request $request, $id)
    {
        if($request->ajax()) {
        $rol = Role::findOrFail($id);
        $permisos = Permission::orderBy('name', 'DESC')->pluck('name', 'id');
        $my_permisos = $rol->perms->pluck('id')->ToArray();
        
            return response()->json([
                'id'                  => $rol->id,
                'nombre'              => $rol->name,
                'permisos'            => $permisos,
                'my_permisos'         => $my_permisos
            ]);
        } 
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $rol = Role::findOrFail($id);
            $rol->perms()->sync($request->permisos_roles); 
            $rol->save();
            return response()->json([
                "message" => "Los permisos del rol ".$rol->name." se han guardado correctamente!"
                ]);
           
        }
    }
}
