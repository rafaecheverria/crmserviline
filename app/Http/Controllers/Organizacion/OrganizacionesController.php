<?php

namespace App\Http\Controllers\Organizacion;

use App\Organizacion;

use App\Region;

use App\Ciudad;

use App\User;

use App\Cargo;

use App\Estado;

use Jenssegers\Date\Date;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ValidarOrganizacionRequest;

use App\Http\Controllers\Controller;

class OrganizacionesController extends Controller
{
    public function index()

    {

        $regiones = Region::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

        $contactos = User::select(['id', 'nombres', 'apellidos'])->withRole("contacto")->orderBy('apellidos', 'asc')->get();

        $vendedores = User::select(['id', 'nombres', 'apellidos'])->withRole("vendedor")->orderBy('nombres', 'asc')->get();

        $cargos = Cargo::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();

        return view('organizaciones.index', compact('regiones', 'contactos', 'vendedores', 'cargos'));

    }

     public function getCiudad(Request $request, $id)

    {

        if ($request->ajax()) {

            $ciudades = Ciudad::ciudades($id);

            return response()->json($doctores);

        }

    }

    public function historial_estado($id)

    {

        $agrupar = Organizacion::obtener_historial_estados($id);

        $estado_actual = Organizacion::estado_actual($id);

        foreach($estado_actual as $v){

            $id_estado = $v->id;

            $estado[] = $v->estado;

            $color[] = $v->color;

        }

        return response()->json([

           "agrupar" => $agrupar,

           "estado_actual" => $id_estado,

           "estado" => $estado,

           "color" => $color,

           "organizacion_id" => $id,

        ]);

    }

    public function store(ValidarOrganizacionRequest $request)

    {

       if($request->ajax()){

            $organizacion = new Organizacion();

            $organizacion->rut         = $request->rut;

            $organizacion->nombre      = $request->nombre; 

            $organizacion->email       = $request->email;

            $organizacion->telefono    = $request->telefono;

            $organizacion->direccion   = $request->direccion;

            $organizacion->tipo        = $request->tipo;

            $organizacion->giro        = $request->giro;

            $organizacion->ciudad_id   = $request->ciudad_id;

            $organizacion->region_id   = $request->region_id;

            $organizacion->vendedor_id = $request->vendedor_id;

            $organizacion->fecha_actualizado = Carbon::now();

            $organizacion->estado_actual = 1; //se guarda el estado PROSPECTO cuando se agrega a una empresa.

            $organizacion->logo  = "default.jpg";

            $organizacion->save();

            $organizacion->users()->sync($request->contacto_id);  

            $organizacion->estados()->attach(1, ['nota' => 'nota 1 de agregado', 'fecha_creado' => Carbon::now(), 'fecha_actualizado' => Carbon::now()]); 

            //Al crear una empresa, se añade automaticamente al estado PROSPECTO que tiene el id 1 en la tabla "estados"

            return response()->json([

                "message" => "La empresa ".$organizacion->nombre." ha sido guardada exitosamente!",

                "nombre" => $organizacion->nombre,

                "id" => $organizacion->id,

                "estado_actual" => $organizacion->estado_actual

                ]);

            }

        }

    public function show()

    {

        $organizaciones = "";


        if(Auth::user()->hasRole('administrador')){

            $organizaciones = Organizacion::with('estados')->selectRaw('distinct organizaciones.*');

        }else{

            $organizaciones = Organizacion::with('estados')->selectRaw('distinct organizaciones.*')->whereHas('users', function ($query) {

                $query->where('organizacion_user.user_id', '=', Auth::user()->id);

                });

        }
        return  datatables()

            ->of($organizaciones)

            ->addColumn('estado', function (Organizacion $organizacion) {

                $estado =  $organizacion->estados()->orderBy("fecha_creado", "DESC")->take(1)->get();

                    return $estado->map(function ($estado) {

                       return '<a href="#" class="label" style="background:'.$estado->color.'">'.$estado->estado.'</a>';

                })->implode('<br>');

            })

           ->addColumn('desactivar', function (Organizacion $organizacion) {

               $estado = Organizacion::traer_datos_estado_organizacion($organizacion)->take(1)->get();

                    return $estado->map(function ($esta) {

                   $checked = ($esta->estado_id <= 6) ? "checked" : "";

                   return '<label class="switch"><input type="checkbox" class="check" name="check" '.$checked.'><span class="slider round" onclick="on_off(this,'.$esta->organizacion_id.', '.$esta->estado_id.',\''.$esta->nombre.'\')"></span></label>' ;

                        
                })->implode('<br>');

            })

            ->addColumn('action', function ($organizacion) {

                $ruta = "organizaciones/";

                $ficha = '<a href="#" onclick="ficha('.$organizacion->id.', 2)" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha Empresa" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">business</i></a>';

                $historial = '<a href="#" onclick="historial_estados('.$organizacion->id.')" rel="tooltip" title="Historial de Estados" class="btn btn-simple btn-info btn-icon"><i class="material-icons">playlist_add</i></a>';

                $estado_actual = Organizacion::estado_actual($organizacion->id);

                foreach($estado_actual as $v){

                    $id_estado = $v->id;

                }   

                if ($id_estado >= 6) {

                    $cambiar_estado = '<p rel="tooltip" disabled title="Cambiar Estado - la empresa ya ha pasado por el proceso completo de seguimiento " class="btn btn-simple btn-default btn-icon"><i class="material-icons">low_priority</i></p>';

                }else{

                    $cambiar_estado = '<a href="#" onclick="mostrar_cambiar_estado('.$organizacion->id.', \''.$organizacion->nombre.'\')" rel="tooltip" title="Cambiar Estado" class="btn btn-simple btn-rose btn-icon"><i class="material-icons">low_priority</i></a>';

                }

                $editar = '<a href="#" onclick="organizacion_user('.$organizacion->id.',2)" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';

                $eliminar = '<a href="#" onclick="eliminar('.$organizacion->id.',\''.$organizacion->nombre.'\',\''.$ruta.'\')" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                return $ficha.$historial.$cambiar_estado.$editar.$eliminar;

            })

            ->rawColumns(['estado','action', 'desactivar'])

            ->make(true);

    }

    public function update_estado(Request $request, $id){

        if($request->ajax()){

            $organizacion = Organizacion::findOrFail($id);

            $organizacion->estado  = $request->estado;

            $organizacion->color = $color;

            $organizacion->save();

            return response()->json([

             "message"=> "El estado de ".$organizacion->nombre." ha sido actualizado exitosamente!",

            ]);

        }

    }

    public function ficha($id)

    {

        $organizacion = Organizacion::findOrFail($id);

        $contacto    = $organizacion->users;

        $color = "";

        $nombre_estado = "";

        $id_estado = 0;

        $datos_estado = $organizacion->estados()->orderBy('fecha_actualizado', 'DESC')->take(1)->get(); //obtiene el ultimo estado.

        foreach($datos_estado as $i => $v)

        {

            $color = $v['color'];

            $nombre_estado =  $v['estado'];

            $id_estado = $v['id'];

        }

        $notas_estado = $organizacion->estados()->select('nota')->where('estado_id', $id_estado)->get()->count();

        return response()->json([

            'notas_estado'  => $notas_estado,

            'color' => $color,

            'nombre_estado' => $nombre_estado,

            'id_estado' => $id_estado,

            'success'  => true,

            'id'       => $organizacion->id,

            'logo'     => $organizacion->logo,

            'rut'      => $organizacion->rut,

            'nombre'   => strtoupper($organizacion->nombre),

            'email'    => strtoupper($organizacion->email),

            'telefono' => $organizacion->telefono,

            'direccion'=> strtoupper($organizacion->direccion),

            'tipo'     => strtoupper($organizacion->tipo),

            'contacto'     => $contacto,

            'actualizacion'=> strtoupper($organizacion->getUpdatedAttribute()),

        ]);

    }

    public function edit(Request $request, $id)

    {

        if($request->ajax()) {

            $organizacion = Organizacion::findOrFail($id);

            $contactos    = User::withRole('contacto')->orderBy('apellidos', 'asc')->get()->pluck('full_name', 'id');

            $my_contactos = $organizacion->users->pluck('id')->ToArray();       

            return response()->json([

                'success'      => true,

                'rut'          => $organizacion->rut,

                'id'           => $organizacion->id,

                'nombre'       => $organizacion->nombre,

                'email'        => $organizacion->email,

                'telefono'     => $organizacion->telefono,

                'direccion'    => $organizacion->direccion,

                'giro'         => $organizacion->giro,

                'logo'         => $organizacion->logo,

                'tipo'         => $organizacion->tipo,

                'ciudad_id'    => $organizacion->ciudad_id,

                'region_id'    => $organizacion->region_id,

                'vendedor_id'  => $organizacion->vendedor_id,

                'contactos'    => $contactos,

                'my_contactos' => $my_contactos

            ]);

        }

    }

    public function update(ValidarOrganizacionRequest $request, $id)

    {

        if($request->ajax()){

            $organizacion = Organizacion::findOrFail($id);

            $organizacion->rut         = $request->rut;

            $organizacion->nombre      = $request->nombre; 

            $organizacion->email       = $request->email;

            $organizacion->telefono    = $request->telefono;

            $organizacion->direccion   = $request->direccion;

            $organizacion->tipo        = $request->tipo;

            $organizacion->giro        = $request->giro;

            $organizacion->ciudad_id   = $request->ciudad_id;

            $organizacion->region_id   = $request->region_id;

            $organizacion->vendedor_id = $request->vendedor_id;

            $organizacion->save();

            $organizacion->users()->sync($request->contacto_id);

            $organizacion->users()->attach($request->vendedor_id);  

            return response()->json([

             "nombre" => $organizacion->nombre,

             "message" => "La empresa ".$organizacion->nombre." ha sido actualizada exitosamente!"

            ]);

        }

    }

    public function destroy($id)

    {

        $organizacion = Organizacion::findOrFail($id);

        Organizacion::destroy($id);

        return response()->json([

            'success' => true,

            "message" => "La empresa ".$organizacion->nombre." se ha eliminado correctamente.",

        ]);

    }
    
}
