<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Corizacion;
use App\Models\Empleado;
use Illuminate\Http\Request;

class ReporteCotizacionController extends Controller
{
    public function index()
    {
        $reporteCotizacion = Cotizacion::with('empleado', 'cliente', 'vehiculo')->get();
        return response()->json($reporteCotizacion);
    }

    public function generarReporte(Request $request)
    {
        $request->validate([
            'fechaDesde' => ($request->tipoReporte == 1) ? 'required' : '',
            'fechaHasta' => ($request->tipoReporte == 1) ? 'required' : '',
        ]);

        if ($request->tipoReporte == 0) {
            $fechaDesde = Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
            $fechaHasta = Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';
        } else {
            $fechaDesde = Carbon::parse($request->fechaDesde)->format('Y-m-d').' 00:00:00';
            $fechaHasta = Carbon::parse($request->fechaHasta)->format('Y-m-d').' 23:59:59';
        }

        $query = Cotizacion::query();

        if ($request->id_cliente != 0) {
            $query->where('cliente_id', $request->id_cliente);
        }

        if ($request->id_empleado != 0) {
            $query->where('empleado_id', $request->id_empleado);
        }

        if ($request->id_vehiculo != 0) {
            $query->where('vehiculo_id', $request->id_vehiculo);
        }

        $query->whereBetween('fecha', [$fechaDesde, $fechaHasta]);

        return response()->json([
            'status' => true,
            'data' => $query->get(),
        ], 200);
    }
}
