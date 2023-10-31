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

        // bitacora
        // $descripcion = 'Se creó un nuevo modelo con ID: '.$modelo->id;
        // registrarBitacora($descripcion);

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

        // bitacora
        // $descripcion = 'Se actualizo un modelo con ID: '.$modelo->id;
        // registrarBitacora($descripcion);

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

        // bitacora
        // $descripcion = 'Se elimino un modelo con ID: '.$modelo->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Modelo eliminado satisfactoriamente',
            'modelo' => $modelo
        ], 200);
    }
}
