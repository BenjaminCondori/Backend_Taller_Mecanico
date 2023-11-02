<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('cliente', 'marca', 'modelo')->get();
        return response()->json($vehiculos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $vehiculo = Vehiculo::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vehiculo creada satisfactoriamente',
            'vehiculo' => $vehiculo
        ], 201);
    }


    public function show(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el vehiculo',
            ], 404);
        }

        return response()->json($vehiculo);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el vehiculo',
            ], 404);
        }

        $vehiculo->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vehiculo actualizado satisfactoriamente',
            'vehiculo' => $vehiculo
        ], 200);
    }


    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el vehiculo',
            ], 404);
        }

        if (!$vehiculo->diagnosticos->isEmpty() || !$vehiculo->estadosVehiculo->isEmpty()) {
            return response()->json([
                'status' => false,
                'error' => 'No se puede eliminar el vehiculo porque tiene diagnosticos asociados',
            ], 500);
        }

        $vehiculo->delete();

        return response()->json([
            'status' => true,
            'message' => 'Vehiculo eliminado satisfactoriamente',
            'vehiculo' => $vehiculo,
        ], 200);
    }
}
