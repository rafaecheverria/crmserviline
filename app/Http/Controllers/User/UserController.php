<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Role;
use App\Http\Requests\CreateRecepcionistaRequest;
use App\Http\Requests\ValidaPasswordRequest;
use App\Http\Requests\UpdateRecepcionistaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class UserController extends ApiController
{
    public function index()
    {
        return view('personas.index');
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(CreateRecepcionistaRequest $request)
    {
        if($request->ajax()){
            $user = new User($request->all());
            $user->save();
            $user->attachRole(3);
            return response()->json([
                "message" => "los registros del recepcionista ".$user->apellidos." se han registrado correctamente !"
            ]);
        }
    }

    public function show()
    {
         $users = User::with('roles')->selectRaw('distinct users.*');
        return  datatables()
                ->of($users)
                ->addColumn('roles', function (User $user) {
                    return $user->roles->map(function($roles) {
                        return str_limit($roles->display_name);
                        })
                ->implode('-');
                })->addColumn('action', function ($user) {
                return '<a href="#" onclick="roles_user('.$user->id.')" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#roleModal"><i class="material-icons">settings_brightness</i></a>
                        <a href="recepcionistas/'.$user->id.'/edit" id="update"  class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>
                        <a href="#" onclick="eliminar_recep('.$user->id.')" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';
            })->make(true);
    }

    public function edit($id)
    {
        $persona = User::findOrFail($id);
        $roles = Role::orderBy('name', 'DESC')->pluck('name', 'id');
        $my_roles = $persona->roles->pluck('id')->ToArray();
        
        return response()->json([
            'success'    => true,
            'rut'        => $persona->rut,
            'id'         => $persona->id,
            'nombres'    => $persona->nombres,
            'apellidos'  => $persona->apellidos,
            'avatar'     => $persona->avatar,
            'roles'      => $roles,
            'my_roles'   => $my_roles
        ]);
    }

    public function getClave($id) 
    {
        $user = User::findOrFail($id);
            return response()->json([
                "id" => $user->id,
                "nombres" => $user->nombres. " ". $user->apellidos,
            ]);
    }

      public function actualizaClave(ValidaPasswordRequest $request, $id) 
    {
       if($request->ajax()){
            $user = User::findOrFail($id);
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
             "nombres" => $user->nombres ." ". $user->apellidos,
             "message" => "La contraseña del usuario ".$user->nombres." ".$user->apellidos." fue actualizada correctamente!"
            ]);
        }
    }

    public function update(UpdateRecepcionistaRequest $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->save();
            return response()->json([
                "apellidos" => $user->apellidos,
                "message" => "los registros del usuario ".$user->apellidos." se han actualizado correctamente !"
                ]);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return response()->json([
            'success' => true,
            "message" => "los registros del doctor ".$user->apellidos." han sido eliminados correctamente !"
        ]);
    }
}
