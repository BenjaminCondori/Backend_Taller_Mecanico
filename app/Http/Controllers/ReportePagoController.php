<?php

namespace App\Http\Controllers;

use App\Models\OrdenDeTrabajo;
use App\Models\Cliente;
use App\Models\Corizacion;
use App\Models\Empleado;
use App\Models\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportePagoController extends Controller
{
    public function index()
    {
        $reportePago = Pago::with('ordenDeTrabajo.cotizacion.empleado', 'ordenDeTrabajo.cotizacion.cliente')->get();
        return response()->json($reportePago);
    }

    public function generarReporte(Request $request)
    {
        if ($request->has('tipoReporte') && $request->tipoReporte == 0) {
            $fechaDesde = Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
            $fechaHasta = Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';
        } else {
            $fechaDesde = Carbon::parse($request->fechaDesde)->format('Y-m-d').' 00:00:00';
            $fechaHasta = Carbon::parse($request->fechaHasta)->format('Y-m-d').' 23:59:59';
        }

        $query = Pago::query();

        if ($request->has('estado') && $request->estado != 0) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('concepto') && $request->concepto != 0) {
            $query->where('concepto', $request->concepto);
        }

        if ($request->has('id_empleado') && $request->id_empleado != 0) {
            $id_empleado = $request->id_empleado;
            $query->whereHas('ordenDeTrabajo.cotizacion.empleado', function ($info) use ($id_empleado){
                $info->where('id',$id_empleado);
            });
        }

        if ($request->has('id_cliente') && $request->id_cliente != 0) {
            $id_cliente = $request->id_cliente;
            $query->whereHas('ordenDeTrabajo.cotizacion.cliente', function ($info) use ($id_cliente){
                $info->where('id',$id_cliente);
            });
        }

        $query->whereBetween('fecha', [$fechaDesde, $fechaHasta]);
        $resultados = $query->with(
            'ordenDeTrabajo.cotizacion.empleado',
            'ordenDeTrabajo.cotizacion.cliente',
        )->get();

        return response()->json([
            'status' => true,
            'pagos' => $resultados,
        ], 200);
    }
}
