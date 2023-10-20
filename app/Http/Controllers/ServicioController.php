<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return response()->json($servicios);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $servicio = Servicio::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Servicio creado satisfactoriamente',
            'servicio' => $servicio
        ], 201);
    }


    public function show(string $id)
    {
        $servicio = Servicio::find($id);

        if (!$servicio) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el servicio',
            ], 404);
        }

        return response()->json($servicio);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $servicio = Servicio::find($id);

        if (!$servicio) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el servicio',
            ], 404);
        }

        $servicio->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Servicio actualizado satisfactoriamente',
            'servicio' => $servicio
        ]);
    }


    public function destroy(string $id)
    {
        $servicio = Servicio::find($id);

        if (!$servicio) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el servicio',
            ], 404);
        }

        $servicio->delete();

        return response()->json([
            'status' => true,
            'message' => 'Servicio eliminado satisfactoriamente',
            'servicio' => $servicio,
        ]);
    }
}
