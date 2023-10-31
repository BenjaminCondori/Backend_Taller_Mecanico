<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
{
    public function index()
    {
        $tipoVehiculos = TipoVehiculo::all();
        return response()->json($tipoVehiculos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $tipoVehiculo = TipoVehiculo::create($request->all());

        // bitacora
        // $descripcion = 'Se creó un nuevo tipo de vehiculo con ID: '.$tipoVehiculo->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vehiculo creada satisfactoriamente',
            'tipoVehiculo' => $tipoVehiculo
        ], 201);
    }


    public function show(string $id)
    {
        $tipoVehiculo = TipoVehiculo::find($id);

        if (!$tipoVehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el tipo de vehiculo',
            ], 404);
        }

        return response()->json($tipoVehiculo);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $tipoVehiculo = TipoVehiculo::find($id);

        if (!$tipoVehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el tipo de vehiculo',
            ], 404);
        }

        $tipoVehiculo->update($request->all());

        // bitacora
        // $descripcion = 'Se actualizo un tipo de vehiculo con ID: '.$tipoVehiculo->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vehiculo actualizada satisfactoriamente',
            'tipoVehiculo' => $tipoVehiculo
        ]);
    }


    public function destroy(string $id)
    {
        $tipoVehiculo = TipoVehiculo::find($id);

        if (!$tipoVehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el tipo de vehiculo',
            ], 404);
        }

        $tipoVehiculo->delete();

        // bitacora
        // $descripcion = 'Se elimino un tipo de vehiculo con ID: '.$tipoVehiculo->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Tipo de vehiculo eliminada satisfactoriamente',
            'tipoVehiculo' => $tipoVehiculo,
        ]);
    }
}
