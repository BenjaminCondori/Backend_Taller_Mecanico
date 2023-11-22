<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //no se si deberia tambien retornar todo cliente servicio y cliente, se me hace mucho
        $reservas = Reserva::with('servicio','cliente','empleado')->get();
        return response()->json($reservas);
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
        $horaInicio = $request->hora_inicio;
        $horaFin = $request->hora_fin;
        $fecha = $request->fecha;

        // Verificar si hay conflictos con reservas existentes
        $conflictos = Reserva::where('fecha', $fecha)
        ->where(function ($query) use ($horaInicio, $horaFin) {
            $query->whereBetween('hora_inicio', [$horaInicio, $horaFin])
                ->orWhereBetween('hora_fin', [$horaInicio, $horaFin])
                ->orWhere(function ($query) use ($horaInicio, $horaFin) {
                    $query->where('hora_inicio', '<', $horaInicio)
                        ->where('hora_fin', '>', $horaFin);
                });
        })
        ->exists();

        //tienes que agendar de 10:00:00 - 10:59:59 para poder agendar 11:00:00 - 11:59:59
        //sino 10:00:01 - 11:00:00 siguiente 11:00:01 - 12:00:00 

        if ($conflictos) {
            return response()->json([
                'status' => false,
                'error' => 'El horario se encuentra ocupado, agende con otra hora',
            ], 404);
        }

        $reserva = Reserva::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Reserva creada satisfactoriamente',
            'reserva' => $reserva
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = Reserva::with('servicio','cliente','empleado')->find($id);

        if (!$reserva) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el Reserva',
            ], 404);
        }

        return response()->json($reserva);
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
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el reserva',
            ], 404);
        }

        $reserva->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'reserva actualizada satisfactoriamente',
            'reserva' => $reserva
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el reserva',
            ], 404);
        }

        $reserva->delete();

        return response()->json([
            'status' => true,
            'message' => 'Reserva eliminada satisfactoriamente',
            'vehiculo' => $reserva,
        ], 200);
    }
}
