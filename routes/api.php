<?php

use App\Http\Controllers\auth\JWTController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoVehiculoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\OrdenDeTrabajoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("/login", [JWTController::class, "login"]);

// Route::group([
//     "middleware" => ["auth:api"]
// ], function () {

Route::get("/profile", [JWTController::class, "profile"]);
Route::post("/refresh", [JWTController::class, "refreshToken"]);
Route::post("/logout", [JWTController::class, "logout"]);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

Route::get('/roles', [RolController::class, 'index']);
Route::post('/roles', [RolController::class, 'store']);
Route::get('/roles/{id}', [RolController::class, 'show']);
Route::put('/roles/{id}', [RolController::class, 'update']);
Route::delete('/roles/{id}', [RolController::class, 'destroy']);

Route::get('/permisos', [PermisoController::class, 'index']);
Route::get('/permisos-obtener/{rol_id}', [PermisoController::class, 'obtenerPermisos']);
Route::post('/permisos-asignar', [PermisoController::class, 'asignarPermiso']);
Route::post('/permisos-desasignar', [PermisoController::class, 'desasignarPermiso']);
Route::post('/permisos-asignarTodos/{rol_id}', [PermisoController::class, 'asignarTodosLosPermisos']);
Route::post('/permisos-desasignarTodos/{rol_id}', [PermisoController::class, 'desasignarTodosLosPermisos']);
Route::get('/permisos-tienePermiso/{rol_id}/{permiso_id}', [PermisoController::class, 'tienePermiso']);

Route::get('/marcas', [MarcaController::class, 'index']);
Route::post('/marcas', [MarcaController::class, 'store']);
Route::get('/marcas/{id}', [MarcaController::class, 'show']);
Route::put('/marcas/{id}', [MarcaController::class, 'update']);
Route::delete('/marcas/{id}', [MarcaController::class, 'destroy']);

Route::get('/modelos', [ModeloController::class, 'index']);
Route::post('/modelos', [ModeloController::class, 'store']);
Route::get('/modelos/{id}', [ModeloController::class, 'show']);
Route::put('/modelos/{id}', [ModeloController::class, 'update']);
Route::delete('/modelos/{id}', [ModeloController::class, 'destroy']);

Route::get('/modelos', [ModeloController::class, 'index']);
Route::post('/modelos', [ModeloController::class, 'store']);
Route::get('/modelos/{id}', [ModeloController::class, 'show']);
Route::put('/modelos/{id}', [ModeloController::class, 'update']);
Route::delete('/modelos/{id}', [ModeloController::class, 'destroy']);

Route::get('/puestos', [PuestoController::class, 'index']);
Route::post('/puestos', [PuestoController::class, 'store']);
Route::get('/puestos/{id}', [PuestoController::class, 'show']);
Route::put('/puestos/{id}', [PuestoController::class, 'update']);
Route::delete('/puestos/{id}', [PuestoController::class, 'destroy']);

Route::get('/vehiculos', [VehiculoController::class, 'index']);
Route::post('/vehiculos', [VehiculoController::class, 'store']);
Route::get('/vehiculos/{id}', [VehiculoController::class, 'show']);
Route::put('/vehiculos/{id}', [VehiculoController::class, 'update']);
Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy']);

Route::get('/tipo-vehiculos', [TipoVehiculoController::class, 'index']);
Route::post('/tipo-vehiculos', [TipoVehiculoController::class, 'store']);
Route::get('/tipo-vehiculos/{id}', [TipoVehiculoController::class, 'show']);
Route::put('/tipo-vehiculos/{id}', [TipoVehiculoController::class, 'update']);
Route::delete('/tipo-vehiculos/{id}', [TipoVehiculoController::class, 'destroy']);

Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'show']);
Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);

Route::get('/diagnosticos', [DiagnosticoController::class, 'index']);
Route::post('/diagnosticos', [DiagnosticoController::class, 'store']);
Route::get('/diagnosticos/{id}', [DiagnosticoController::class, 'show']);
Route::put('/diagnosticos/{id}', [DiagnosticoController::class, 'update']);
Route::delete('/diagnosticos/{id}', [DiagnosticoController::class, 'destroy']);

Route::get('/EstadoVehiculo', [EstadoVehiculoController::class, 'index']);
Route::post('/EstadoVehiculo', [EstadoVehiculoController::class, 'store']);
Route::get('/EstadoVehiculo/{id}', [EstadoVehiculoController::class, 'show']);
Route::put('/EstadoVehiculo/{id}', [EstadoVehiculoController::class, 'update']);
Route::delete('/EstadoVehiculo/{id}', [EstadoVehiculoController::class, 'destroy']);

Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'show']);
Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

Route::get('/servicios', [ServicioController::class, 'index']);
Route::post('/servicios', [ServicioController::class, 'store']);
Route::get('/servicios/{id}', [ServicioController::class, 'show']);
Route::put('/servicios/{id}', [ServicioController::class, 'update']);
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy']);

Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

Route::get('/inventarios', [InventarioController::class, 'index']);
Route::post('/inventarios', [InventarioController::class, 'store']);
Route::get('/inventarios/{id}', [InventarioController::class, 'show']);
Route::put('/inventarios/{id}', [InventarioController::class, 'update']);
Route::delete('/inventarios/{id}', [InventarioController::class, 'destroy']);

Route::get('/bitacoras', [BitacoraController::class, 'index']);
Route::post('/bitacoras', [BitacoraController::class, 'store']);

Route::get('/cotizaciones', [CotizacionController::class, 'index']);
Route::post('/cotizaciones', [CotizacionController::class, 'store']);
Route::get('/cotizaciones/{id}', [CotizacionController::class, 'show']);
Route::put('/cotizaciones/{id}', [CotizacionController::class, 'update']);
Route::delete('/cotizaciones/{id}', [CotizacionController::class, 'destroy']);
Route::get('/cotizacion_producto', [CotizacionController::class, 'indexProductos']);
Route::get('/cotizacion_servicio', [CotizacionController::class, 'indexServicios']);
Route::post('/cotizacion_producto', [CotizacionController::class, 'storeProductos']);
Route::post('/cotizacion_servicio', [CotizacionController::class, 'storeServicios']);
Route::delete('/cotizacion_producto/{id}', [CotizacionController::class, 'destroyProductos']);
Route::delete('/cotizacion_servicio/{id}', [CotizacionController::class, 'destroyServicios']);

Route::get('/orden-trabajos', [OrdenDeTrabajoController::class, 'index']);
Route::post('/orden-trabajos', [OrdenDeTrabajoController::class, 'store']);
Route::get('/orden-trabajos/{id}', [OrdenDeTrabajoController::class, 'show']);
Route::put('/orden-trabajos/{id}', [OrdenDeTrabajoController::class, 'update']);
Route::delete('/orden-trabajos/{id}', [OrdenDeTrabajoController::class, 'destroy']);

Route::delete('/orden-trabajos/{id}', [OrdenDeTrabajoController::class, 'destroy']);

//Rutas para la parte movil
Route::get('/clientes/{idUsuario}/datos', [ClienteController::class, 'datosCliente']);
Route::get('/vehiculos/{idCliente}/autos', [VehiculoController::class, 'vehiculosPorCliente']);
Route::get('/estado_vehiculo/{idVehiculo}/estados', [EstadoVehiculoController::class, 'estadoPorVehiculo']);





