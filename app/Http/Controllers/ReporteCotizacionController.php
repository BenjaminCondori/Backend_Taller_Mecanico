<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Empleado;
use Carbon\Carbon;
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

        $query = Cotizacion::query();

        if ($request->has('id_cliente') && $request->id_cliente != 0) {
            $query->where('cliente_id', $request->id_cliente);
        }

        if ($request->has('id_empleado') &&  $request->id_empleado != 0) {
            $query->where('empleado_id', $request->id_empleado);
        }

        // if ($request->has('id_vehiculo') && $request->id_vehiculo != 0) {
        //     $query->where('vehiculo_id', $request->id_vehiculo);
        // }

        if ($request->has('id_marca') && $request->id_marca!= 0) {
            $id_marca= $request->id_marca;
            $query->whereHas('vehiculo.marca', function ($info) use ($id_marca){
                $info->where('id',$id_marca);
            });
        }

        if ($request->has('id_modelo') && $request->id_modelo != 0) {
            $id_modelo= $request->id_modelo;
            $query->whereHas('vehiculo.modelo', function ($info) use ($id_modelo){
                $info->where('id',$id_modelo);
            });
        }

        if ($request->has('id_tipo_vehiculo') && $request->id_tipo_vehiculo != 0) {
            $id_tipo_vehiculo = $request->id_tipo_vehiculo;
            $query->whereHas('vehiculo.modelo', function ($info) use ($id_tipo_vehiculo){
                $info->where('id',$id_tipo_vehiculo);
            });
        }

        if ($request->has('id_servicio') && $request->id_servicio != 0) {
            $id_servicio = $request->id_servicio;
            $query->whereHas('servicios', function ($info) use ($id_servicio){
                $info->where('servicios.id',$id_servicio);
            });
        }

        if ($request->has('id_producto') && $request->id_producto != 0) {
            $id_producto = $request->id_producto;
            $query->whereHas('productos', function ($info) use ($id_producto){
                $info->where('productos.id',$id_producto);
            });
        }

        $query->whereBetween('fecha', [$fechaDesde, $fechaHasta]);
        $resultados = $query->with(
            'cliente',
            'empleado',
            'vehiculo.marca',
            'vehiculo.modelo',
            'vehiculo.tipoVehiculo',
            'servicios',
            'productos',
        )->get();

        return response()->json([
            'status' => true,
            'cotizaciones' => $resultados,
        ], 200);
    }
}
