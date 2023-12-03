<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\VentaProducto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with('cliente','pago')->get();

        return response()->json($ventas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venta = Venta::create([
        'fecha' => Carbon::now(),
        'monto' => $request->monto,
        'cliente_id' => $request->cliente_id,]);

        return response()->json([
            'status' => true,
            'message' => 'Venta creada satisfactoriamente',
            'venta' => $venta
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = Venta::with(
            'cliente',
            'productos',
            'pago'          
        )->find($id);

        return response()->json($venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la venta'
            ], 404);
        }

        $venta->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Venta actualizada satisfactoriamente',
            'modelo' => $venta
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la venta'
            ], 404);
        }

        $venta->delete();

        return response()->json([
            'status' => true,
            'message' => 'Venta borrada satisfactoriamente',
        ], 200);
    }

    public function indexProductos(Venta $venta)
    {
        $productos = $venta->productos()->get();

        return response()->json($productos);
    }

    public function storeProductos(Venta $venta, Request $request)
    {
        $ventaproducto = VentaProducto::create([
            'venta_id' => $venta->id,
            'producto_id' => $request->producto_id,
            'producto_cantidad' => $request->producto_cantidad,
            'producto_preciototal' => $request->producto_preciototal,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Producto insertado en la venta satisfactoriamente',
            'ventaproducto' => $ventaproducto
        ], 201);
    }

    public function actualizarTotal(Venta $venta)
    {
        if (!$venta) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la venta'
            ], 404);
        }

        $productos = $venta->productos()->get();
        $monto_total = 0;
        foreach($productos as $producto){
            $monto_total = $monto_total + $producto->pivot->producto_preciototal;
        }

        $venta->update(['monto' => $monto_total]);

        return response()->json([
            'status' => true,
            'message' => 'Venta actualizada satisfactoriamente',
            'venta' => $venta
        ], 200);
    }

    public function destroyProductos(string $id)
    {
        $ventaProducto = VentaProducto::find($id);

        if (!$ventaProducto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el registro VentaProducto',
            ], 404);
        }

        $ventaProducto->delete();

        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado de la venta satisfactoriamente',
            'cotiProducto' => $ventaProducto
        ]);
    }
}
