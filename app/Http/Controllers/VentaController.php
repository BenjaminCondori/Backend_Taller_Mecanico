<?php

namespace App\Http\Controllers;

use App\Models\Pago;
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
        $ventas = Venta::with('cliente','empleado','pago')->get();

        return response()->json($ventas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fecha = Carbon::now()->format('Y-m-d H:i:s');

        $venta = Venta::create([
        'fecha' => $fecha,
        'monto' => $request->monto,
        'cliente_id' => $request->cliente_id,
        'empleado_id' => $request->empleado_id ]);

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
            'empleado',
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

        $this->actualizarTotal($venta);

        return response()->json([
            'status' => true,
            'message' => 'Producto insertado en la venta satisfactoriamente',
            'ventaproducto' => $ventaproducto
        ], 201);
    }

// esta funcion revisa cada registro de VentaProducto y suma los montos para sacar el monto total de la venta
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

    public function generarPago(Venta $venta)
    {
        if (!$venta) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la venta'
            ], 404);
        }

        $pago = Pago::create([
            'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
            'monto' => $venta->monto,
            'estado' => false,
            'concepto' => 'Venta',
        ]);

        $venta->update([
            'pago_id' =>$pago->id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Pago para venta generado exitosamente',
            'venta' => $venta->with('pago')->find($venta->id)
        ], 200);

    }

    public function destroyProductos(Venta $venta, string $id)
    {
        
        if (!$venta) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el registro VentaProducto',
            ], 404);
        }

        $venta->productos()->detach($id);
        $this->actualizarTotal($venta);

        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado de la venta satisfactoriamente',
            'VentaProductos' => $venta->productos()->get() 
        ]);
    }
}
