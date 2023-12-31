<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SolicitudAsistenciaController extends Controller
{
    public function index()
    {
        $solicitudes = SolicitudAsistencia::with(
            'cliente',
            'tecnico',
            'vehiculo',
            'servicio'
        )->get();
        return response()->json($solicitudes, 200);
    }


    public function create()
    {
        //
    }

    public function getSolicitudesClienteById(string $id)
    {
        $solicitudes = SolicitudAsistencia::find($id);
        if (!$solicitudes) {
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe.'
            ], 404);
        }

        $solicitudes = SolicitudAsistencia::where('cliente_id', $id)
            ->with('tecnico', 'vehiculo', 'servicio')
            ->get();
        return response()->json($solicitudes, 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion_problema' => 'required|string',
            // 'estado' => 'required|string',
            'latitud' => 'required|string',
            'longitud' => 'required|string',
            'direccion' => 'required|string',
            'audio' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'cliente_id' => 'required',
            'vehiculo_id' => 'nullable',
            'servicio_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ], 400);
        }

        // Comenzar la transacción
        DB::beginTransaction();

        try {
            $urlImage = null;
            $urlAudio = null;

            if ($request->hasFile("imagen")) {
                $file = $request->file("imagen");
                $originalFileName = $file->getClientOriginalName();
                $fileName = time() . '_' . pathinfo($originalFileName, PATHINFO_FILENAME); // Elimina la extensión
                $fileName = Str::slug($fileName) . '.' . $file->getClientOriginalExtension();
                $pathImage = $file->storeAs('public/img/solicitudes', $fileName);
                $urlImage = Storage::url($pathImage);
            }

            if ($request->hasFile("audio")) {
                $file = $request->file("audio");
                $originalFileName = $file->getClientOriginalName();
                $fileName = time() . '_' . pathinfo($originalFileName, PATHINFO_FILENAME); // Elimina la extensión
                $fileName = Str::slug($fileName) . '.' . $file->getClientOriginalExtension();
                $pathAudio = $file->storeAs('public/img/solicitudes', $fileName);
                $urlAudio = Storage::url($pathAudio);
            }

            $solicitud = SolicitudAsistencia::create([
                'descripcion_problema' => $request->input('descripcion_problema'),
                'estado' => 'Pendiente',
                'latitud' => $request->input('latitud'),
                'longitud' => $request->input('longitud'),
                'direccion' => $request->input('direccion'),
                'audio' => $urlAudio,
                'imagen' => $urlImage,
                'cliente_id' => $request->input('cliente_id'),
                'vehiculo_id' => $request->input('vehiculo_id'),
                'servicio_id' => $request->input('servicio_id'),
            ]);

            // Todo salió bien, realizar la confirmación de la transacción
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Solicitud de asistencia registrado exitosamente.',
                'data' => $solicitud,
            ], 201);
        } catch (\Exception $e) {
            // Algo salió mal, revertir la transacción
            DB::rollBack();

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Ocurrió un error al registrar la solicitud.'
            ], 500);
        }
    }


    public function show(string $id)
    {
        $solicitud = SolicitudAsistencia::with(
            'cliente',
            'tecnico',
            'vehiculo',
            'servicio'
        )->find($id);

        if (!$solicitud) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la solicitud de asistencia',
            ], 404);
        }

        return response()->json($solicitud, 200);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tecnico_id' => 'required',
            'estado' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ], 400);
        }

        // Comenzar la transacción
        DB::beginTransaction();

        try {
            $solicitud = SolicitudAsistencia::find($id);

            if (!$solicitud) {
                return response()->json([
                    'status' => false,
                    'message' => 'Solicitud de asistencia no encontrada.',
                ], 404);
            }

            $solicitud->tecnico_id = $request->input('tecnico_id');
            $solicitud->estado = $request->input('estado');

            $solicitud->save();

            // Todo salió bien, realizar la confirmación de la transacción
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Solicitud de asistencia actualizada exitosamente.',
                'solicitud' => $solicitud,
            ], 200);
        } catch (\Exception $e) {
            // Algo salió mal, revertir la transacción
            DB::rollBack();

            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
                'message' => 'Ocurrió un error al actualizar la solicitud.'
            ], 500);
        }
    }



    public function destroy(string $id)
    {
        $solicitud = SolicitudAsistencia::find($id);

        if (!$solicitud) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la solicitud de asistencia',
            ], 404);
        }

        $solicitud->delete();

        return response()->json([
            'status' => true,
            'message' => 'Solicitud de asistencia eliminada satisfactoriamente',
            'solicitud' => $solicitud,
        ]);
    }
}
