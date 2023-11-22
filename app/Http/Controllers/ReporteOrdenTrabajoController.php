<?php

namespace App\Http\Controllers;

use App\Models\OrdenDeTrabajo;
use App\Models\Cliente;
use App\Models\Corizacion;
use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReporteOrdenTrabajoController extends Controller
{

    public function index()
    {
        $reporteOrdenTrabajo = OrdenDeTrabajo::with('cotizacion.empleado', 'cotizacion.cliente')->get();
        return response()->json($reporteOrdenTrabajo);
    }

    public function generarReporte(Request $request)
    {
        // $request->validate([
        //     'fechaDesde' => ($request->tipoReporte == 1) ? 'required' : '',
        //     'fechaHasta' => ($request->tipoReporte == 1) ? 'required' : '',
        // ]);

        if ($request->has('tipoReporte') && $request->tipoReporte == 0) {
            $fechaDesde = Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
            $fechaHasta = Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';
        } else {
            $fechaDesde = Carbon::parse($request->fechaDesde)->format('Y-m-d').' 00:00:00';
            $fechaHasta = Carbon::parse($request->fechaHasta)->format('Y-m-d').' 23:59:59';
        }

        $query = OrdenDeTrabajo::query();

        // if ($request->id_cotizacion != 0) {
        //     $query->where('cotizacion_id', $request->id_cotizacion);
        // }

        if ($request->has('id_mecanico') && $request->id_mecanico != 0) {
            $query->where('mecanico_id', $request->id_mecanico);
        }

        if ($request->has('estado') && $request->estado != 0) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('id_empleado') && $request->id_empleado != 0) {
            $id_empleado = $request->id_empleado;
            $query->whereHas('cotizacion.empleado', function ($info) use ($id_empleado){
                $info->where('id',$id_empleado);
            });
        }

        if ($request->has('id_cliente') && $request->id_cliente != 0) {
            $id_cliente = $request->id_cliente;
            $query->whereHas('cotizacion.cliente', function ($info) use ($id_cliente){
                $info->where('id',$id_cliente);
            });
        }

        if ($request->has('id_servicio') && $request->id_servicio != 0) {
            $id_servicio = $request->id_servicio;
            $query->whereHas('cotizacion.servicios', function ($info) use ($id_servicio){
                $info->where('servicios.id',$id_servicio);
            });
        }

        if ($request->has('id_producto') && $request->id_producto != 0) {
            $id_producto = $request->id_producto;
            $query->whereHas('cotizacion.productos', function ($info) use ($id_producto){
                $info->where('productos.id',$id_producto);
            });
        }

        // if ($request->id_vehiculo != 0) {
        //     $id_vehiculo = $request->id_vehiculo;
        //     $query->whereHas('cotizacion.vehiculo', function ($info) use ($id_vehiculo){
        //         $info->where('id',$id_vehiculo);
        //     });
        // }

        $query->whereBetween('fecha_creacion', [$fechaDesde, $fechaHasta]);
        $resultados = $query->with(
            'cotizacion.cliente',
            'cotizacion.empleado',
            'cotizacion.servicios',
            'cotizacion.productos',
            'mecanico',
            // 'pago',
        )->get();

        return response()->json([
            'status' => true,
            'ordenes' => $resultados,
        ], 200);
    }

}
