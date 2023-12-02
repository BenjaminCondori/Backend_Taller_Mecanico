<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleCompra;

class DetalleCompraController extends Controller
{
    public function index()
    {
        $detallecompra = DetalleCompra::with('notacompra', 'producto')->get();
        return response()->json($detallecompra);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $detallecompra = DetalleCompra::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Detalle de compra creado satisfactoriamente',
            'detallecompra' => $detallecompra,
        ], 201);
    }
    public function show(string $id)
    {
        $detallecompra = DetalleCompra::find($id);
        if (!$detallecompra) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el detalle de compra',
            ], 404);
        }
        return response()->json($detallecompra);
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        $detallecompra = DetalleCompra::find($id);
        if (!$detallecompra) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el detalle de compra',
            ], 404);
        }
        $detallecompra->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Detalle de compra actualizado satisfactoriamente',
            'detallecompra' => $detallecompra,
        ]);
    }
    public function destroy(string $id)
    {
        $detallecompra = DetalleCompra::find($id);
        if (!$detallecompra) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el detalle de compra',
            ], 404);
        }
        $detallecompra->delete();
        return response()->json([
            'status' => true,
            'message' => 'Detalle de compra eliminado satisfactoriamente',
        ]);
    }
}
