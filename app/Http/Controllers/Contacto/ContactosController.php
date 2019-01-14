<?php

namespace App\Http\Controllers\Contacto;

use App\User;
use App\Role;
use App\Cargo;
use App\Organizacion;
use App\Region;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CrearContactoRequest;
use App\Http\Requests\ActualizarContactoRequest;
use App\Http\Controllers\Controller;

class ContactosController extends Controller
{
    
    public function index()

    {

        $cargos = Cargo::obtener_cargos();

        $empresas = Organizacion::obtener_empresas();

        $regiones = Region::obtener_regiones();

        $vendedores = User::obtener_persona_segun_rol("vendedor")->get();

        $contactos = User::obtener_persona_segun_rol("contacto")->get();

        return view('contactos.index', compact('cargos', 'empresas', 'regiones', 'vendedores', 'contactos'));

    }

    public function store(CrearContactoRequest $request)

    {

        if($request->ajax()){

            $persona = new User();

            $persona->nombres   = $request->nombres_user;

            $persona->apellidos = $request->apellidos_user;

            $persona->telefono  = $request->telefono_user;

            $persona->genero    = $request->genero;

            $persona->cargo_id  = $request->cargo_id;

            $persona->avatar    = "default.jpg";

            $persona->save();

            $persona->organizaciones()->attach($request->organizacion_id);

            $persona->attachRole(3); //3 es el numero id del rol contacto

            $tipo_user = "contacto";

            $id = "contacto_id";

            $personas = User::obtener_persona_segun_rol($request->tipo_user)->orderBy('apellidos', 'asc')->get();

            $my_persona = $persona->id;

             //Actualiza el contacto en la tabla pivote con el tipo de persona

            $array = [];

            $size = count((array)$request->organizacion_id);

            for ($i=0; $i < $size; $i++) { 
                
                $array[$request->organizacion_id[$i]] = [ 'tipo' => 'contacto' ];
            }

            $persona->organizaciones()->sync($array);

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

                        $ficha = '<a href="#" onclick="ficha('.$user->id.', 1)" rel="tooltip" title="Ficha del contacto" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';

                        $editar = '<a href="#" onclick="mostrar_contacto('.$user->id.', 2)" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';

                        $eliminar = '<a href="#" onclick="eliminar('.$user->id.',\''.$user->nombres." ".$user->apellidos.'\',\''.$ruta.'\')" data-toggle="modal" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$editar.$eliminar;
                       
                    })->make(true);
                    
    }

    public function edit(Request $request, $id)

    {

        if($request->ajax()) {

            $persona = User::obtener_persona($id);

            $organizaciones  = Organizacion::obtener_empresas()->pluck('nombre', 'id');

            $my_organizaciones = $persona->organizaciones->pluck('id')->ToArray();   

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

                'organizaciones'    => $organizaciones,

                'my_organizaciones' => $my_organizaciones

            ]);

        }

    }

     public function update(ActualizarContactoRequest $request, $id)

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

            //Actualiza el contacto en la tabla pivote con el tipo de persona

            $array = [];

            $size = count((array)$request->organizacion_id);

            for ($i=0; $i < $size; $i++) { 
                
                $array[$request->organizacion_id[$i]] = [ 'tipo' => 'contacto' ];
            }

            $persona->organizaciones()->sync($array);

            return response()->json([

             "apellidos" => $persona->apellidos,

             "message" => "El contacto ".$persona->nombres." ".$persona->apellidos." ha sido actualizado correctamente !"

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