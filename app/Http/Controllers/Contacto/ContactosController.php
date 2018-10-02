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
        $cargos = Cargo::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
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
            $personas = User::select(['id', 'nombres', 'apellidos'])->withRole($request->tipo_user)->orderBy('apellidos', 'asc')->get();
            $my_persona = $persona->id;
            return response()->json([
                "message"    => "El ".$request->tipo_user." ".$persona->nombres." ".$persona->apellidos." se agregó exitosamente",
                "personas"   => $personas,
                "my_persona" => $my_persona,
                "tipo_user"  => $tipo_user,
                "id"         => $id
                ]);
        }
    }

    public function show()
    {
        $users = User::select(['id', 'rut', 'nombres', 'apellidos', 'telefono', 'nacimiento'])->withRole('contacto');
        return  datatables()->of($users)
                ->editColumn('nacimiento', function ($user) {
                 return $user->getYearsAttribute();
                    })
                    ->addColumn('action', function ($user) {
                        $ficha = '<a href="#" onclick="ficha_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $expediente = '<a href="#" onclick="expediente_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_expediente" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>';
                        $editar = '<a href="#" onclick="carga_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_editar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="delete_paciente('.$user->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$expediente.$editar.$eliminar;
                       
                    })->make(true);
    }

    public function edit($id)
    {
        $paciente = User::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $paciente->id,
            'avatar'      => $paciente->avatar,
            'rut'         => $paciente->rut,
            'nombres'     => $paciente->nombres,
            'apellidos'   => $paciente->apellidos,
            'nacimiento'  => Carbon::parse($paciente->nacimiento)->format('d-m-Y'),
            'genero'      => $paciente->genero,
            'email'       => $paciente->email,
            'telefono'    => $paciente->telefono,
            'direccion'   => $paciente->direccion,
            'sangre'      => $paciente->sangre,
            'vih'         => $paciente->vih,
            'peso'        => $paciente->peso,
            'altura'      => $paciente->altura,
            'alergia'     => $paciente->alergia,
            'medicamento' => $paciente->medicamento_actual,
            'enfermedad'  => $paciente->enfermedad,
        ]);
    }

     public function update(Request $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->nombres            = $request->nombres_e;
            $user->apellidos          = $request->apellidos_e;
            $user->nacimiento         = Carbon::parse($request->nacimiento_e)->format('Y-m-d');
            $user->email              = $request->email_e;
            $user->telefono           = $request->telefono_e;
            $user->direccion          = $request->direccion_e;
            $user->genero             = $request->genero_e;
            $user->sangre             = $request->sangre_e;
            $user->vih                = $request->vih_e;
            $user->peso               = $request->peso_e;
            $user->altura             = $request->altura_e;
            $user->alergia            = $request->alergia_e;
            $user->medicamento_actual = $request->medicamento_e;
            $user->enfermedad         = $request->enfermedad_e;
            $user->save();
            return response()->json([
             "apellidos" => $user->apellidos,
             "message" => "El paciente ".$user->nombres." ".$user->apellidos." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Query::where('paciente_id', $id)->count();
        if ($query > 0) {
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero el paciente que desea eliminar cuenta con historial clínico!",
                "type"    => 'warning'
            ]);
        }else{
            $user = User::findOrFail($id);
            User::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "los registros del paciente ".$user->apellidos." han sido eliminados correctamente !",
                "type"    => 'success'

            ]);
        }
        
    }
}
