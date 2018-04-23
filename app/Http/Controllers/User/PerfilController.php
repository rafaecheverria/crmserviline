<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Support\Carbon;
use App\Http\Requests\UpdatePerfilRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    
    public function update(UpdatePerfilRequest $request, $id)
    {
        if($request->ajax()){
            $mi_cuenta = User::findOrFail($id);
            $mi_cuenta->nombres            = $request->nombres;
            $mi_cuenta->apellidos          = $request->apellidos;
            $mi_cuenta->nacimiento         = Carbon::parse($request->nacimiento)->format('Y-m-d');
            $mi_cuenta->email              = $request->email;
            $mi_cuenta->telefono           = $request->telefono;
            $mi_cuenta->direccion          = $request->direccion;
            $mi_cuenta->genero             = $request->genero;
            $mi_cuenta->save();
            return response()->json([
             "message" => "Mis datos se han actualizado correctamente !"
            ]);
        }
    }

}
