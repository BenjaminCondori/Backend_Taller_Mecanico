<?php

namespace App\Http\Controllers;

use App\Models\NotaCompra;
use Illuminate\Http\Request;

class NotaCompraController extends Controller
{

    public function index()
    {
        $notacompra = NotaCompra::with('proveedor', 'empleado', 'detalleCompra')->get();
        return response()->json($notacompra);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $notacompra = NotaCompra::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Nota de compra creada satisfactoriamente',
            'notacompra' => $notacompra,
        ], 201);
    }
    public function show(string $id)
    {
        $notacompra = NotaCompra::find($id);
        if (!$notacompra) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la nota de compra',
            ], 404);
        }
        return response()->json($notacompra);
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        $notacompra = NotaCompra::find($id);
        if (!$notacompra) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la nota de compra',
            ], 404);
        }
        $notacompra->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Nota de compra actualizada satisfactoriamente',
            'notacompra' => $notacompra,
        ]);
    }
    public function destroy(string $id)
    {
        $notacompra = NotaCompra::find($id);
        if (!$notacompra) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la nota de compra',
            ], 404);
        }
        $notacompra->delete();
        return response()->json([
            'status' => true,
            'message' => 'Nota de compra eliminada satisfactoriamente',
        ]);
    }
}
