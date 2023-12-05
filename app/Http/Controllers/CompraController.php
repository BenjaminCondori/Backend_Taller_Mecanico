<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Compra;
use App\Models\CompraProducto;

class CompraController extends Controller
{

    public function index()
    {
        $compras = Compra::with('proveedor', 'productos')->get();

        return response()->json($compras);
    }
    public function store(Request $request)
    {
        $fecha = Carbon::now()->format('Y-m-d H:i:s');

        $compra = Compra::create([
            'fecha' => $fecha,
            'monto' => $request->monto,
            'proveedor_id' => $request->proveedor_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Compra creada satisfactoriamente',
            'compra' => $compra
        ], 201);
    }
    public function show(string $id)
    {
        $compra = Compra::with(
            'proveedor',
            'productos',
        )->find($id);

        return response()->json($compra);
    }
    public function update(Request $request, string $id)
    {
        $compra = compra::find($id);

        if (!$compra) {
            return response()->json([
                'status' => false,
                'message' => 'Compra no encontrada'
            ], 404);
        }

        $compra->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Compra actualizada satisfactoriamente',
            'compra' => $compra
        ]);
    }
    public function destoy(string $id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json([
                'status' => false,
                'message' => 'Compra no encontrada'
            ], 404);
        }

        $compra->delete();

        return response()->json([
            'status' => true,
            'message' => 'Compra eliminada satisfactoriamente'
        ], 200);
    }
    public function indexProductos(Compra $compra)
    {
        $productos = $compra->productos()->get();

        return response()->json($productos);
    }
    public function storeProductos(Compra $compra, Request $request)
    {
        $compraproducto = CompraProducto::create([
            'compra_id' => $compra->id,
            'producto_id' => $request->producto_id,
            'producto_cantidad' => $request->producto_cantidad,
            'producto_preciototal' => $request->producto_preciototal,
        ]);

        $this->actualizarTotal($compra);
        return response()->json([
            'status' => true,
            'message' => 'Producto agregado satisfactoriamente',
            'compraproducto' => $compraproducto
        ], 201);
    }
    public function actualizarTotal(Compra $compra)
    {
        if (!$compra) {
            return response()->json([
                'status' => false,
                'message' => 'Compra no encontrada'
            ], 404);
        }
        $productos = $compra->productos()->get();
        $monto_total = 0;
        foreach ($productos as $producto) {
            $monto_total += $producto->pivot->producto_preciototal;
        }
        $compra->update(['monto' => $monto_total]);

        return response()->json([
            'status' => true,
            'message' => 'Compra actualizada satisfactoriamente',
            'compra' => $compra
        ], 200);
    }
    public function destroyProductos(Compra $compra, string $id)
    {
        if (!$compra) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontro el registro de CompraProducto'
            ], 404);
        }

        $compra->productos()->detach($id);
        $this->actualizarTotal($compra);

        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado de la compra satisfactoriamente',
            'CompraProducto' => $compra->productos()->get()
        ], 200);
    }
}
