<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json($proveedores);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $proveedor = Proveedor::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Proveedor creado satisfactoriamente',
            'proveedor' => $proveedor
        ], 201);
    }


    public function show(string $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el proveedor',
            ], 404);
        }

        return response()->json($proveedor);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::find($request->id);

        if (!$proveedor) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el proveedor',
            ], 404);
        }

        $proveedor->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Proveedor actualizado satisfactoriamente',
            'proveedor' => $proveedor
        ], 200);
    }


    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el proveedor',
            ], 404);
        }

        $proveedor->delete();

        return response()->json([
            'status' => true,
            'message' => 'Proveedor eliminado satisfactoriamente',
            'proveedor' => $proveedor,
        ], 200);
    }
}
