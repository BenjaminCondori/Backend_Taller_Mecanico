<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return response()->json($inventarios);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $inventario = Inventario::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Inventario creado satisfactoriamente',
            'inventario' => $inventario
        ], 201);
    }


    public function show(string $id)
    {
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el inventario',
            ], 404);
        }

        return response()->json($inventario);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el inventario',
            ], 404);
        }

        $inventario->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Inventario actualizado satisfactoriamente',
            'inventario' => $inventario
        ]);
    }


    public function destroy(string $id)
    {
        $inventario = Inventario::find($id);

        if (!$inventario) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el inventario',
            ], 404);
        }

        $inventario->delete();

        return response()->json([
            'status' => true,
            'message' => 'Inventario eliminado satisfactoriamente',
            'inventario' => $inventario
        ]);
    }
}
