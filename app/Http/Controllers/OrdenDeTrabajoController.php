<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\OrdenDeTrabajo;
use Illuminate\Http\Request;

class OrdenDeTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenTrabajo = OrdenDeTrabajo::with(
            'empleado',
            'cotizacion.cliente',
            'cotizacion.vehiculo',
        )->get();
        return response()->json($ordenTrabajo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ordenDeTrabajo = OrdenDeTrabajo::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Orden de trabajo creada satisfactoriamente',
            'ordenDeTrabajo' => $ordenDeTrabajo
        ], 201);
    }


    public function getOrdenes(string $clienteId) {
        $cliente = Cliente::find($clienteId);

        if (!$cliente) {
            return response()->json([
                'status' => false,
                'error' => 'Cliente no encontrado'
            ], 404);
        }

        $ordenes = OrdenDeTrabajo::whereHas('cotizacion', function ($query) use ($clienteId) {
            $query->where('cliente_id', $clienteId);
        })
        ->with(['empleado'])
        ->get();

        return response()->json([
            'status' => true,
            'ordenes' => $ordenes,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordenDeTrabajo = OrdenDeTrabajo::with(
            'empleado',
            'cotizacion.cliente',
            'cotizacion.vehiculo.marca',
            'cotizacion.vehiculo.modelo',
            'cotizacion.vehiculo.tipoVehiculo',
            'cotizacion.servicios',
            'cotizacion.productos'
        )->find($id);

        if (!$ordenDeTrabajo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el orden de trabajo',
            ], 404);
        }

        return response()->json($ordenDeTrabajo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ordenDeTrabajo = OrdenDeTrabajo::find($id);

        if (!$ordenDeTrabajo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el orden de trabajo',
            ], 404);
        }

        $ordenDeTrabajo->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Orden de trabajo actualizada satisfactoriamente',
            'ordenDeTrabajo' => $ordenDeTrabajo
        ], 200);
    }

    public function updateEstado(Request $request, string $id)
    {
        $ordenDeTrabajo = OrdenDeTrabajo::find($id);

        if (!$ordenDeTrabajo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el orden de trabajo',
            ], 404);
        }

        $ordenDeTrabajo->update(['estado' => $request->estado]);

        return response()->json([
            'status' => true,
            'message' => 'Orden de trabajo actualizada satisfactoriamente',
            'ordenDeTrabajo' => $ordenDeTrabajo
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ordenDeTrabajo = OrdenDeTrabajo::find($id);

        if (!$ordenDeTrabajo) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el orden de trabajo',
            ], 404);
        }

        $ordenDeTrabajo->delete();

        return response()->json([
            'status' => true,
            'message' => 'Orden de trabajo eliminada satisfactoriamente',
            'ordenDeTrabajo' => $ordenDeTrabajo,
        ]);
    }

}
