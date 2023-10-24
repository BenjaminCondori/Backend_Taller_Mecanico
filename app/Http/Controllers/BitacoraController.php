<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Bitacora;
>>>>>>> tipovehiculo
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        //
=======
        $bitacora = Bitacora::all();
        return response()->json($bitacora);
>>>>>>> tipovehiculo
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
<<<<<<< HEAD
        //
=======
        $bitacora = Bitacora::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Bitacora creada satisfactoriamente',
            'bitacora' => $bitacora
        ], 201);
>>>>>>> tipovehiculo
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show(string $id)
=======
    public function show(Bitacora $bitacora)
>>>>>>> tipovehiculo
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(string $id)
=======
    public function edit(Bitacora $bitacora)
>>>>>>> tipovehiculo
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, string $id)
=======
    public function update(Request $request, Bitacora $bitacora)
>>>>>>> tipovehiculo
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(string $id)
=======
    public function destroy(Bitacora $bitacora)
>>>>>>> tipovehiculo
    {
        //
    }
}
