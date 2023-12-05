<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with(
            'factura',
            'ordenDeTrabajo.cotizacion.cliente',
            'ordenDeTrabajo.cotizacion.empleado',
            'venta',
            'venta.empleado',
            'venta.cliente'
        )->get();
        return response()->json($pagos);
    }


    public function store(Request $request)
    {
        $pago = Pago::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Pago creado satisfactoriamente',
            'pago' => $pago
        ], 201);
    }


    public function getPagos(string $clienteId) {
        $cliente = Cliente::find($clienteId);

        if (!$cliente) {
            return response()->json([
                'status' => false,
                'error' => 'Cliente no encontrado'
            ], 404);
        }

        // $cotizaciones = Cotizacion::where('cliente_id', $clienteId)->with('ordenDeTrabajo.pago.factura')->get();

         // Solo seleccionamos las columnas necesarias
         // ahora busca en todas las cotizaciones y ventas los registros que tengan el cliente id
         // en venta de paso verifica que el campo pago_id no sea null
         // porque al crear la venta esta no posee pago
        $pagos = Pago::where(function ($query) use ($clienteId) {
        $query->whereHas('ordenDeTrabajo.cotizacion', function ($subQuery) use ($clienteId) {
            $subQuery->where('cliente_id', $clienteId);
        })
        ->orWhereHas('venta', function ($subQuery) use ($clienteId) {
            $subQuery->where('cliente_id', $clienteId)
                ->whereNotNull('pago_id'); 
        });
        })
        ->with(['factura'])
        ->get();

        return response()->json([
            'status' => true,
            // 'cotizaciones' => $cotizaciones,
            'pagos' => $pagos,
        ], 200);
    }


    public function show(string $id)
    {

        $pago = Pago::with(
            'factura',
            'ordenDeTrabajo.cotizacion.cliente',
            'venta',
            'venta.cliente'
        )->find($id);

        if (!$pago) {
            return response()->json([
                'status' => false,
                'error' => 'Pago no encontrado'
            ], 404);
        }

        return response()->json($pago);
    }



    public function update(Request $request, string $id)
    {
        $pago = Pago::find($id);

        if (!$pago) {
            return response()->json([
                'status' => false,
                'error' => 'Pago no encontrado'
            ], 404);
        }

        $pago->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Pago actualizado satisfactoriamente',
            'pago' => $pago
        ], 200);
    }


    public function destroy(string $id)
    {
        $pago = Pago::find($id);

        if (!$pago) {
            return response()->json([
                'status' => false,
                'error' => 'Pago no encontrado'
            ], 404);
        }

        $pago->delete();

        return response()->json([
            'status' => true,
            'message' => 'Pago eliminado satisfactoriamente',
            'pago' => $pago
        ], 200);
    }
}
