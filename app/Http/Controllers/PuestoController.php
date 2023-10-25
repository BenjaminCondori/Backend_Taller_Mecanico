<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        $puestos = Puesto::all();
        return response()->json($puestos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $puesto = Puesto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // bitacora
        $descripcion = 'Se creó un nuevo puesto con ID: '.$puesto->id;
        registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Puesto creado satisfactoriamente',
            'puesto' => $puesto
        ], 201);
    }


    public function show(string $id)
    {
        $puesto = Puesto::find($id);

        if (!$puesto) {
            return response()->json(['error' => 'No se encontró el puesto'], 404);
        }

        return response()->json($puesto);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $puesto = Puesto::find($id);

        if (!$puesto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el puesto',
            ], 404);
        }

        $puesto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // bitacora
        $descripcion = 'Se actualizo un puesto con ID: '.$puesto->id;
        registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Puesto actualizado satisfactoriamente',
            'puesto' => $puesto
        ], 200);
    }


    public function destroy(string $id)
    {
        $puesto = Puesto::find($id);

        if (!$puesto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el puesto',
            ], 404);
        }

        if (!$puesto->empleados->isEmpty()) {
            return response()->json([
                'status' => false,
                'error' => 'Ocurrió un error al eliminar el puesto',
            ], 500);
        }

        $puesto->delete();

        // bitacora
        $descripcion = 'Se elimino el puesto con ID: '.$puesto->id;
        registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Puesto eliminado satisfactoriamente',
            'puesto' => $puesto
        ], 200);
    }
}
