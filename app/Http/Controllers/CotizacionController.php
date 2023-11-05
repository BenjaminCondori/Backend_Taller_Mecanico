<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cotizacion;
use App\Models\CotizacionProducto;
use App\Models\CotizacionServicio;
use App\Models\Producto;
use App\Models\Servicio;
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
    public function indexProductos()
    {
        $cotiProductos = CotizacionProducto::all();
        return response()->json($cotiProductos);
    }
    public function indexServicios()
    {
        $cotiServicios = CotizacionServicio::all();
        return response()->json($cotiServicios);
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

        // bitacora
        // $descripcion = 'Se creó una nueva cotizacion con ID: '.$cotizacion->id;
        // registrarBitacora($descripcion);*/

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion creada satisfactoriamente',
            'cotizacion' => $cotizacion
        ], 201);
    }
    public function storeProductos(Request $request)
    {
        // se crea una nueva producto en la cotizacion
        $producto = CotizacionProducto::create([
            'producto_cantidad' => $request->producto_cantidad,
            'producto_preciototal' => $request->producto_preciototal,
            'cotizacion_id' => $request->cotizacion_id,
            'producto_id' => $request->producto_id,
        ]);

        // bitacora
        // $descripcion = 'Se creó una nueva producto con ID: '.$producto->id;
        // registrarBitacora($descripcion);*/

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion Producto creada satisfactoriamente',
            'producto' => $producto
        ], 201);
    }
    public function storeServicios(Request $request)
    {
        // se crea una nueva servicio en la cotizacion
        $servicio = CotizacionServicio::create([
            'servicio_cantidad' => $request->servicio_cantidad,
            'servicio_preciototal' => $request->servicio_preciototal,
            'cotizacion_id' => $request->cotizacion_id,
            'servicio_id' => $request->servicio_id,
        ]);

        // bitacora
        // $descripcion = 'Se creó una nueva servicio con ID: '.$servicio->id;
        // registrarBitacora($descripcion);*/

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion Servicio creada satisfactoriamente',
            'servicio' => $servicio
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
        ->join('modelos', 'vehiculos.modelo_id', '=', 'modelos.id')
        ->join('marcas', 'vehiculos.marca_id', '=', 'marcas.id')
        ->where('vehiculos.id', $cotizacion->vehiculo_id)
        ->select('vehiculos.*', 'modelos.nombre as modelo_nombre', 'marcas.nombre as marca_nombre')
        ->first();

        // se obtiene todos los productos que estan relaizionados con el id que tiene la corizacion
        $productos = DB::table('cotizacion_producto as cp')
                        ->join('cotizaciones', 'cotizaciones.id', '=', 'cp.cotizacion_id')
                        ->join('productos', 'cp.producto_id','=', 'productos.id')
                        ->select('cp.*', 'productos.nombre as producto_nombre', 'productos.precio_venta as producto_precio')
                        ->where('cp.cotizacion_id', $cotizacion->id)
                        ->get();

        // se obtiene todos los servicios que estan relacionados con el id que tiene la cotizacion
        $servicios = DB::table('cotizacion_servicio as cs')
                        ->join('cotizaciones', 'cotizaciones.id', '=', 'cs.cotizacion_id')
                        ->join('servicios', 'cs.servicio_id','=', 'servicios.id')
                        ->select('cs.*', 'servicios.nombre as servicio_nombre', 'servicios.precio as servicio_precio')
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
        $cotizacion = Cotizacion::find($request->id);

        if (!$cotizacion) {
            // Si no se encuentra el cliente, devuelve una respuesta de error
            return response()->json(['error' => 'Cotizacion no encontrado'], 404);
        }
        $cotizacion->precio = $request->precioTotal;
        $cotizacion->save();

        $data = [
            'status' => 'true',
            'message' => 'Cotizacion actualizado satisfactoriamente',
            'Cotizacion' => $cotizacion
        ];
        return response()->json($data);
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
            // Elimina primero los registros relacionados en cotizacion_producto
    CotizacionProducto::where('cotizacion_id', $id)->delete();

    // Luego, elimina los registros relacionados en cotizacion_servicio
    CotizacionServicio::where('cotizacion_id', $id)->delete();

        $cotizacion->delete();

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion eliminada satisfactoriamente',
            'cotizacion' => $cotizacion
        ]);
    }
    public function destroyProductos(string $id)
    {
        $cotiProducto = CotizacionProducto::find($id);

        if (!$cotiProducto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la cotizacion',
            ], 404);
        }

        $cotiProducto->delete();

        // bitacora
        // $descripcion = 'Se elimino la cotizacion con ID: '.$cotizacion->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion eliminada satisfactoriamente',
            'cotiProducto' => $cotiProducto
        ]);
    }
    public function destroyServicios(string $id)
    {
        $cotiServicio = CotizacionServicio::find($id);

        if (!$cotiServicio) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la cotizacion',
            ], 404);
        }

        $cotiServicio->delete();

        // bitacora
        // $descripcion = 'Se elimino la cotizacion con ID: '.$cotizacion->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Cotizacion eliminada satisfactoriamente',
            'cotiServicio' => $cotiServicio
        ]);
    }
    
}
