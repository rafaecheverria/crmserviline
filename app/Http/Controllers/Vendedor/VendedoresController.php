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
use App\Http\Controllers\Controller;

class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::obtener_cargos();
        return view('vendedores.index', compact('cargos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
                        $eliminar = '<a href="#" onclick="eliminar('.$user->id.',\''.$user->nombre.'\',\''.$ruta.'\')" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$editar.$eliminar;
                       
                    })->make(true);
    }

     public function ficha($id)
    {
        $persona = User::obtener_persona($id);
        //$empresas  = $persona->organizaciones;
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
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
