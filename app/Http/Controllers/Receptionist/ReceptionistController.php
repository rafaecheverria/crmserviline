<?php

namespace App\Http\Controllers\Receptionist;

use App\User;
use App\Role;
use Illuminate\Support\Carbon;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ReceptionistController extends ApiController
{
    public function index()
    {
        return view('recepcionistas.index');
    }

    public function create()
    {
        return view('recepcionistas.create');
    }

     public function store(CreateUserRequest $request)
    {
        if($request->ajax()){
            $recepcionista = new User();
            $recepcionista->rut                = $request->rut_add;
            $recepcionista->nombres            = $request->nombres_add;
            $recepcionista->apellidos          = $request->apellidos_add;
            $recepcionista->nacimiento         = Carbon::parse($request->nacimiento_add)->format('Y-m-d');
            $recepcionista->email              = $request->email_add;
            $recepcionista->telefono           = $request->telefono_add;
            $recepcionista->direccion          = $request->direccion_add;
            $recepcionista->genero             = $request->genero_add;
            $recepcionista->avatar             = "default.jpg";
            $recepcionista->save();
            $recepcionista->attachRole(3); //3 es el numero id del rol recepcionista
            return response()->json([
                "tipo" => "recepcionista",
                "message" => "El recepcionista ".$recepcionista->nombres." ".$recepcionista->apellidos." ha sido guardado exitosamente !"
                ]);
        }
    }

    public function show()
    {
            
         $recepcionistas = User::with('roles')->selectRaw('distinct users.*')->withRole('recepcionista');
        return  datatables()->eloquent($recepcionistas)
                    ->addColumn('action', function ($recepcionista) {
                    $clave = '<a href="#" onclick="getClave('.$recepcionista->id.')" data-toggle="modal" data-target="#modal_clave" rel="tooltip" title="Resetear contraseña" class="btn btn-simple btn-primary btn-icon edit"><i class="material-icons">vpn_key</i></a>';
                    $editar ='<a href="#" onclick="carga_usuario('.$recepcionista->id.')" data-toggle="modal" data-target="#modal_editar_recepcionista" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                    $eliminar ='<a href="#" onclick="delete_recepcionista('.$recepcionista->id.')"  data-toggle="modal" data-target="#eliminar_recepcionista" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';

                     return $clave.$editar.$eliminar;
            })
            ->make(true);
    }

    public function edit($id)
    {
        $recepcionista = User::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $recepcionista->id,
            'avatar'      => $recepcionista->avatar,
            'nombres'     => $recepcionista->nombres,
            'apellidos'   => $recepcionista->apellidos,
            'nacimiento'  => Carbon::parse($recepcionista->nacimiento)->format('d-m-Y'),
            'genero'      => $recepcionista->genero,
            'email'       => $recepcionista->email,
            'telefono'    => $recepcionista->telefono,
            'direccion'   => $recepcionista->direccion,
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if($request->ajax()){
            $recepcionista = User::findOrFail($id);
            $recepcionista->nombres            = $request->nombres;
            $recepcionista->apellidos          = $request->apellidos;
            $recepcionista->nacimiento         = Carbon::parse($request->nacimiento_e)->format('Y-m-d');
            $recepcionista->email              = $request->email;
            $recepcionista->telefono           = $request->telefono;
            $recepcionista->direccion          = $request->direccion;
            $recepcionista->genero             = $request->genero;
            $recepcionista->save();
            return response()->json([
             "tipo" => "recepcionista",
             "apellidos" => $recepcionista->apellidos,
             "message" => "El recepcionista ".$recepcionista->nombres." ".$recepcionista->apellidos." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return response()->json([
            'success' => true,
            "message" => "los registros del recepcionista ".$user->nombres." ".$user->apellidos." han sido eliminados correctamente !"
        ]);
    }
}

