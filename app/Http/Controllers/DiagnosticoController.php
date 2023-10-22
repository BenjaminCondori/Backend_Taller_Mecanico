<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnostico = Diagnostico::all();
        return response()->json($diagnostico);
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
        $diagnostico = Diagnostico::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico creada satisfactoriamente',
            'diagnostico' => $diagnostico
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diagnostico = Diagnostico::find($id);

        if (!$diagnostico) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el diagnostico de vehiculo',
            ], 404);
        }

        return response()->json($diagnostico);
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
        $diagnostico = Diagnostico::find($id);

        if (!$diagnostico) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el diagnostico',
            ], 404);
        }

        $diagnostico->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico actualizada satisfactoriamente',
            'diagnostico' => $diagnostico
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnostico = Diagnostico::find($id);

        if (!$diagnostico) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el diagnostico',
            ], 404);
        }

        $diagnostico->delete();

        return response()->json([
            'status' => true,
            'message' => 'Diagnosttico eliminada satisfactoriamente',
            'diagnostico' => $diagnostico,
        ]);
    }
}
