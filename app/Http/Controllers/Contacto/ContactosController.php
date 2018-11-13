<?php

namespace App\Http\Controllers\Contacto;

use App\User;
use App\Role;
use App\Query;
use App\Cargo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactosController extends Controller
{
    public function index()
    {
        $cargos = Cargo::obtener_cargos();
        return view('contactos.index', compact('cargos'));
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $persona = new User();
            $persona->rut       = $request->rut_user;
            $persona->nombres   = $request->nombres_user;
            $persona->apellidos = $request->apellidos_user;
            $persona->email     = $request->email_user;
            $persona->telefono  = $request->telefono_user;
            $persona->direccion = $request->direccion_user;
            $persona->genero    = $request->genero;
            $persona->cargo_id  = $request->cargo_id;
            $persona->avatar    = "default.jpg";
            $persona->save();
            if ($request->tipo_user === "vendedor") {
                    $persona->attachRole(2); //2 es el numero id del rol vendedor
                    $tipo_user = "vendedor";
                    $id = "vendedor_id";
                }else{
                    $persona->attachRole(3); //3 es el numero id del rol contacto
                    $tipo_user = "contacto";
                    $id = "contacto_id";
                }
            $personas = User::obtener_persona_segun_rol($request->tipo_user)->orderBy('apellidos', 'asc')->get();
            $my_persona = $persona->id;
            return response()->json([
                "message"    => "El ".$request->tipo_user." ".$persona->nombres." ".$persona->apellidos." se agregó exitosamente",
                "personas"   => $personas,
                "my_persona" => $my_persona,
                "tipo_user"  => $tipo_user,
                "id"         => $id,
            ]);
        }
    }

    public function ficha($id)
    {
        $persona = User::obtener_persona($id);
        $empresas  = $persona->organizaciones;

        $cargo = Cargo::obtener_cargo_persona($persona->cargo_id);
        foreach($cargo as $i => $v)
        {
            $nombre_cargo = $v['nombre'];
        }
        return response()->json([
            'success'  => true,
            'id'       => $persona->id,
            'avatar'   => $persona->avatar,
            'rut'      => $persona->rut,
            'nombres'  => strtoupper($persona->nombres. " " . $persona->apellidos),
            'email'    => strtoupper($persona->email),
            'telefono' => $persona->telefono,
            'genero'   => strtoupper($persona->genero),
            'direccion'=> strtoupper($persona->direccion),
            'empresas' => $empresas,
            'cargo'    => $nombre_cargo

        ]);
    }

    public function show()
    {
        $users = User::obtener_persona_segun_rol("contacto");
        return  datatables()->of($users)
                ->editColumn('nacimiento', function ($user) {
                 return $user->getYearsAttribute();
                    })
                    ->addColumn('action', function ($user) {
                        $ruta = "contactos/";
                        $ficha = '<a href="#" onclick="ficha('.$user->id.', 1)" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $editar = '<a href="#" onclick="mostrar_contacto('.$user->id.', 2)" data-toggle="modal" data-target="#modal_editar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="eliminar('.$user->id.',\''.$user->nombre.'\',\''.$ruta.'\')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$editar.$eliminar;
                       
                    })->make(true);
    }

    public function edit(Request $request, $id)
    {
        if($request->ajax()) {

            $persona = User::obtener_persona($id);
            return response()->json([
                'success'     => true,
                'id'          => $persona->id,
                'avatar'      => $persona->avatar,
                'rut'         => $persona->rut,
                'nombres'     => $persona->nombres,
                'apellidos'   => $persona->apellidos,
                'genero'      => $persona->genero,
                'email'       => $persona->email,
                'telefono'    => $persona->telefono,
                'direccion'   => $persona->direccion,
                'cargo'       => $persona->cargo_id,
            ]);
        }
    }

     public function update(Request $request, $id)
    {
        if($request->ajax()){
            $persona = User::obtener_persona($id);
            $persona->rut       = $request->rut_user;
            $persona->nombres   = $request->nombres_user;
            $persona->apellidos = $request->apellidos_user;
            $persona->email     = $request->email_user;
            $persona->telefono  = $request->telefono_user;
            $persona->direccion = $request->direccion_user;
            $persona->genero    = $request->genero;
            $persona->cargo_id  = $request->cargo_id;
            $persona->avatar    = "default.jpg";
            $persona->save();
            return response()->json([
             "apellidos" => $persona->apellidos,
             "message" => "El paciente ".$persona->nombres." ".$persona->apellidos." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
       $persona = User::obtener_persona($id);
        User::destroy($id);
        return response()->json([
            'success' => true,
            "message" => "El registro de ".$persona->nombres." ".$persona->apellidos." se ha eliminado correctamente.",
        ]);
    }
}