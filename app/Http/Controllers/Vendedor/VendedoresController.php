<?php

namespace App\Http\Controllers\Vendedor;

use App\User;
use App\Role;
use App\Query;
use App\Cargo;
use App\Organizacion;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\InsertarVendedorRequest;
use App\Http\Requests\ActualizarVendedorRequest;
use App\Http\Controllers\Controller;

class VendedoresController extends Controller
{

    public function index()
    {
        $cargos = Cargo::obtener_cargos();
        return view('vendedores.index', compact('cargos'));
    }

    public function create()
    {
        //
    }

    public function store(InsertarVendedorRequest $request)

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

            $persona->avatar    = "default.jpg";

            $persona->password  = bcrypt(substr($request->rut_user,0,4));

            $persona->save();
         
            $persona->attachRole(2); //2 es el numero id del rol vendedor

            $tipo_user = "vendedor";

            $id = "vendedor_id";
                
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

    public function show($id)

    {

       $users = User::obtener_persona_segun_rol("vendedor");

        return  datatables()->of($users)

                ->editColumn('nacimiento', function ($user) {

                 return $user->getYearsAttribute();

                    })

                    ->addColumn('action', function ($user) {

                        $ruta = "contactos/";

                        $ficha = '<a href="#" onclick="ficha('.$user->id.', 3)" rel="tooltip" title="Ficha del vendedor" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';

                        $editar = '<a href="#" onclick="mostrar_contacto('.$user->id.', 1)" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';

                        $eliminar = '<a href="#" onclick="eliminar('.$user->id.',\''.$user->nombres." ".$user->apellidos.'\',\''.$ruta.'\')" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$editar.$eliminar;
                       
                    })->make(true);

    }

     public function ficha($id)

    {

        $persona = User::obtener_persona($id);

        $empresas = Organizacion::where("vendedor_id", $persona->id)->get();

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

        ]);

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

            ]);

        }
    }

    public function update(ActualizarVendedorRequest $request, $id)

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

            $persona->avatar    = "default.jpg";

            $persona->save();

            return response()->json([

             "apellidos" => $persona->apellidos,

             "message" => "El vendedor ".$persona->nombres." ".$persona->apellidos." ha sido actualizado correctamente !"

            ]);

        }

    }

    public function destroy($id)
    {
        //
    }
}
