<?php

namespace App\Http\Controllers\Region;

use App\Ciudad;
use App\Region;
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

     public function getRegion(Request $request, $id)
    {
        if ($request->ajax()) {
            $regiones = Region::regiones($id);
            return response()->json($regiones);
        }
    }
}
