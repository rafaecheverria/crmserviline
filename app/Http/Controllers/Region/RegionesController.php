<?php

namespace App\Http\Controllers\Region;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionesController extends Controller
{
   public function getCiudad(Request $request, $id)
    {
        if ($request->ajax()) {
            $ciudades = Ciudad::ciudades($id);
            return response()->json($ciudades);
        }
    }
}
