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
        $organizacion = Organizacion::findOrFail($id); //obtiene la organización seleccionada.
        $nota = $organizacion->estados()->first()->pivot->nota;
        $estado_actual = $organizacion->estados()->orderBy('fecha_creado', 'DESC')->take(1)->get(); //obtiene el estado actual (ultimo registro segun fecha creación).
        $historial_estados = $organizacion->estados()->select('estado_id', 'estado', 'color', 'organizacion_id', 'nota','fecha_creado','fecha_actualizado')->orderBy('fecha_actualizado', 'DESC')->get();

        $agrupar = $historial_estados->mapToGroups(function ($item, $key) {
            return [$item['estado'] => [$item['estado_id'], $item['estado'], $item['nota'], Date::parse($item['fecha_creado'])->format('j F Y'), Date::parse($item['fecha_actualizado'])->format('j F Y'), $item['color']]];
        });
        $agrupar->toArray();

        $id = array();
        foreach($estado_actual as $v){
            $id[] = $v->id;
            } 
        return response()->json([
           "agrupar" => $agrupar,
           "estado_actual" => $id,
        ]);
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
            $organizacion->color       = "#F44336";
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
        $organizaciones = Organizacion::select(['id', 'rut', 'nombre', 'telefono', 'direccion', 'email']);
        return  datatables()->of($organizaciones)
            ->editColumn('direccion', function ($dir) {
                return ucwords($dir->direccion);
            })->addColumn('action', function ($organizacion) {
                        $ruta = "organizaciones/";
                        $ficha = '<a href="#" onclick="ficha('.$organizacion->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha Empresa" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">business</i></a>';
                        $historial = '<a href="#" onclick="historial_estados('.$organizacion->id.')" rel="tooltip" title="Historial de Estados" class="btn btn-simple btn-info btn-icon"><i class="material-icons">history</i></a>';
                        $editar = '<a href="#" onclick="organizacion_user('.$organizacion->id.',2)" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="eliminar('.$organizacion->id.',\''.$organizacion->nombre.'\',\''.$ruta.'\')" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$historial.$editar.$eliminar;
                       
                    })->make(true);
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
