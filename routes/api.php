<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



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

