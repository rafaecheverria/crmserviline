<?php

namespace App\Http\Controllers\Organizacion;

use App\Organizacion;
use App\Region;
use App\Ciudad;
use App\User;
use App\Cargo;
use Illuminate\Http\Request;
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

    public function create()
    {
        //
    }

    public function store(Request $request)
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
            $organizacion->estado      = "prospecto";
            $organizacion->logo        = "default.jpg";
            $organizacion->save();
            $organizacion->users()->sync($request->contacto_id);  
            return response()->json([
                "message" => "La empresa ".$organizacion->nombre." ha sido guardada exitosamente!"
                ]);
        }
    }

    public function show()
    {
        $organizaciones = Organizacion::select(['id', 'rut', 'nombre', 'telefono', 'direccion', 'email', 'giro']);
        return  datatables()->of($organizaciones)
            ->editColumn('direccion', function ($dir) {
                return ucwords($dir->direccion);
            })->editColumn('giro', function ($gir) {
                return ucwords($gir->giro);
            })->addColumn('action', function ($organizacion) {
                        $ruta = "organizaciones/";
                        $ficha = '<a href="#" onclick="ficha('.$organizacion->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $expediente = '<a href="#" onclick="expediente_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#modal_expediente" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>';
                        $editar = '<a href="#" onclick="organizacion_user('.$organizacion->id.',2)" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="eliminar('.$organizacion->id.',\''.$organizacion->nombre.'\',\''.$ruta.'\')" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$expediente.$editar.$eliminar;
                       
                    })->make(true);
    }

    public function ficha($id)
    {
        $organizacion = Organizacion::findOrFail($id);
        $contacto    = $organizacion->users;
        return response()->json([
            'success'      => true,
            'id'           => $organizacion->id,
            'logo'         => $organizacion->logo,
            'rut'          => $organizacion->rut,
            'nombre'       => strtoupper($organizacion->nombre),
            'email'        => strtoupper($organizacion->email),
            'telefono'     => $organizacion->telefono,
            'direccion'    => strtoupper($organizacion->direccion),
            'tipo'         => strtoupper($organizacion->tipo),
            'estado'       => strtoupper($organizacion->estado),
            'actualizacion'=> strtoupper($organizacion->getUpdatedAttribute()),
            'contacto'     => $contacto,
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

    public function update(Request $request, $id)
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
        //$reservas = Query::where('estado', 'pendiente')->count(); //actualiza la tarjeta del home
        return response()->json([
            'success' => true,
            "message" => "La empresa ".$organizacion->nombre." se ha eliminado correctamente.",
        ]);
    }
    
}
