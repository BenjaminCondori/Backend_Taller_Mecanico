<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return response()->json($marcas);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $marca = Marca::create($request->all());

        // bitacora
        // $descripcion = 'Se creó una nueva marca con ID: '.$marca->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Marca creada satisfactoriamente',
            'marca' => $marca
        ], 201);
    }


    public function show(string $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la marca',
            ], 404);
        }

        return response()->json($marca);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la marca'
            ], 404);
        }

        $marca->update($request->all());

        // bitacora
        // $descripcion = 'Se actualizo una marca con ID: '.$marca->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Marca actualizada satisfactoriamente',
            'marca' => $marca
        ], 200);
    }


    public function destroy(string $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la marca'
            ], 404);
        }

        $marca->delete();

        // bitacora
        // $descripcion = 'Se elimino una marca con ID: '.$marca->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Marca eliminada satisfactoriamente',
            'marca' => $marca
        ], 200);
    }
}
