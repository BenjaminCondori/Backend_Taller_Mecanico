<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::with('marca')->get();
        return response()->json($modelos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $modelo = Modelo::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Modelo creado satisfactoriamente',
            'modelo' => $modelo
        ], 201);
    }


    public function show(string $id)
    {
        $modelo = Modelo::find($id);

        if (!$modelo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el modelo'
            ], 404);
        }

        return response()->json($modelo);
    }

  function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $modelo = Modelo::find($id);

        if (!$modelo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el modelo'
            ], 404);
        }

        $modelo->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Modelo actualizado satisfactoriamente',
            'modelo' => $modelo
        ], 200);
    }


    public function destroy(string $id)
    {
        $modelo = Modelo::find($id);

        if (!$modelo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el modelo'
            ], 404);
        }

        $modelo->delete();

        return response()->json([
            'status' => true,
            'message' => 'Modelo eliminado satisfactoriamente',
            'modelo' => $modelo
        ], 200);
    }
}
