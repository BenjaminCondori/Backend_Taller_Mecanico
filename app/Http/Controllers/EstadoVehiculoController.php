<?php

namespace App\Http\Controllers;

use App\Models\EstadoVehiculo;
use Illuminate\Http\Request;

class EstadoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$estadosVehiculo = EstadoVehiculo::all();
        $estadosVehiculo = EstadoVehiculo::with('vehiculo.cliente')->get();
        return response()->json($estadosVehiculo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
            $estadoVehiculo = EstadoVehiculo::create($request->all());
    
            return response()->json([
                'status' => true,
                'message' => 'Estado de vehiculo creado satisfactoriamente',
                'estadoVehiculo' => $estadoVehiculo
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estadoVehiculo = EstadoVehiculo::find($id);

        if (!$estadoVehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el estado de vehiculo',
            ], 404);
        }

        return response()->json($estadoVehiculo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estadoVehiculo = EstadoVehiculo::find($id);

        if (!$estadoVehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el estado de vehiculo',
            ], 404);
        }

        $estadoVehiculo->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Estado de vehiculo actualizado satisfactoriamente',
            'estadoVehiculo' => $estadoVehiculo
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estadoVehiculo = EstadoVehiculo::find($id);

        if (!$estadoVehiculo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el estado de vehiculo',
            ], 404);
        }

        $estadoVehiculo->delete();

        return response()->json([
            'status' => true,
            'message' => 'Estado de vehiculo eliminado satisfactoriamente',
            'estadoVehiculo' => $estadoVehiculo
        ], 200);
    }
}
