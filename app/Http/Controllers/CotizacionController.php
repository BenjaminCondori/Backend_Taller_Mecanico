<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cotizacion;
use App\Models\CotizacionProducto;
use App\Models\CotizacionServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cotizacion = Cotizacion::all();
        return response()->json($cotizacion);
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
        // se crea una nueva cotizacion
        $cotizacion = Cotizacion::create([
            'descripcion' => $request->descripcion,
            'fecha' => Carbon::now(),
            'precio' => $request->precioTotal,
            'cliente_id' => $request->cliente,
            'vehiculo_id' => $request->vehiculo,
        ]);

        // se registra la tabla intermedia entre cotizacion y producto
        // $productos = $request->productos;
        // foreach($productos as $item)
        //     CotizacionProducto::create([
        //         'producto_cantidad' => $item['producto_cantidad'],
        //         'producto_preciototal' => (float)[$item['producto_cantidad']]*(float) [$item['precio']],
        //         'cotizacion_id' => $cotizacion->id,
        //         'producto_id' => $item['id'],
        //     ]);

        // se registra la tabla intermedia enrte cotizacion y servicios
        // $servicios = $request->servicios;
        // foreach($servicios as $item)
        //     CotizacionServicio::create([
        //         'servicio_cantidad' => $item['servicio_cantidad'],
        //         'servicio_preciototal' => (float) [$item['servicio_cantidad']]* (float) [$item['precio']],
        //         'cotizacion_id' => $cotizacion->id,
        //         'servicio_id' => $item['id'],
        //     ]);

        // bitacora
        // $descripcion = 'Se creó una nueva cotizacion con ID: '.$cotizacion->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion creada satisfactoriamente',
            'cotizacion' => $cotizacion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cotizacion = Cotizacion::find($id);

        if (!$cotizacion) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la cotizacion',
            ], 404);
        }

        // buscamos la informacion del cliente con el cliente_id que tiene la cotizacion
        $cliente = DB::table('clientes')
                        ->where('id', $cotizacion->cliente_id)
                        ->first();

        // buscamos la informacion del vehiculo con el vehiculo_id que tiene la cotizacion
        $vehiculo = DB::table('vehiculos')
                        ->where('id', $cotizacion->vehiculo_id)
                        ->first();

        // se obtiene todos los productos que estan relaizionados con el id que tiene la corizacion
        $productos = DB::table('cotizacion_producto as cp')
                        ->join('cotizaciones', 'cotizacion.id', '=', 'cp.cotizacion_id')
                        ->join('productos', 'cp.producto_id','=', 'productos.id')
                        ->select('productos.*')
                        ->where('cp.cotizacion_id', $cotizacion->id)
                        ->get();

        // se obtiene todos los servicios que estan relacionados con el id que tiene la cotizacion
        $servicios = DB::table('cotizacion_servicio as cs')
                        ->join('cotizaciones', 'cotizacion.id', '=', 'cs.cotizacion_id')
                        ->join('servicios', 'cs.servicio_id','=', 'servicios.id')
                        ->select('servicios.*')
                        ->where('cs.cotizacion_id', $cotizacion->id)
                        ->get();

        return response()->json([
            'cotizacion' => $cotizacion,
            'cliente' => $cliente,
            'vehiculo' => $vehiculo,
            'productos' => $productos,
            'servicios' => $servicios
        ]);
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
        // NO SE ACTUALIZARA UNA COTIZACION
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cotizacion = Cotizacion::find($id);

        if (!$cotizacion) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la cotizacion',
            ], 404);
        }

        $cotizacion->delete();

        // bitacora
        // $descripcion = 'Se elimino la cotizacion con ID: '.$cotizacion->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion eliminada satisfactoriamente',
            'cotizacion' => $cotizacion
        ]);
    }
}
