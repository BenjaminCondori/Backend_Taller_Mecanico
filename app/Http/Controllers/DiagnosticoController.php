<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index()
    {
        // $diagnostico = Diagnostico::all();
        $diagnosticos = Diagnostico::with('vehiculo.cliente')->get();
        return response()->json($diagnosticos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $diagnostico = Diagnostico::create($request->all());

        // bitacora
        // $descripcion = 'Se creo un nuevo diagnostico con ID: '.$diagnostico->id;
        // registrarBitacora($request, $descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico creado satisfactoriamente',
            'diagnostico' => $diagnostico
        ], 201);
    }


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


    public function edit(string $id)
    {
        //
    }


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

        // bitacora
        // $descripcion = 'Se actualizo el diagnostico con ID: '.$diagnostico->id;
        // registrarBitacora($request, $descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico actualizado satisfactoriamente',
            'diagnostico' => $diagnostico
        ], 200);
    }


    public function destroy(Request $request, string $id)
    {
        $diagnostico = Diagnostico::find($id);

        if (!$diagnostico) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el diagnostico',
            ], 404);
        }

        $diagnostico->delete();

        // bitacora
        // $descripcion = 'Se elimino el diagnostico con ID: '.$diagnostico->id;
        // registrarBitacora($request, $descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Diagnosttico eliminada satisfactoriamente',
            'diagnostico' => $diagnostico,
        ]);
    }
}
