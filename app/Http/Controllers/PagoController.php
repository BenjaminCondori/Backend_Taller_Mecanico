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
            'ordenDeTrabajo.cotizacion.cliente'
        )->get();
        return response()->json($pagos);
    }


    public function create()
    {

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
        $pagos = Pago::whereHas('ordenDeTrabajo.cotizacion', function ($query) use ($clienteId) {
            $query->where('cliente_id', $clienteId);
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
            'ordenDeTrabajo.cotizacion.cliente'
        )->find($id);

        if (!$pago) {
            return response()->json([
                'status' => false,
                'error' => 'Pago no encontrado'
            ], 404);
        }

        return response()->json($pago);
    }


    public function edit(string $id)
    {

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
