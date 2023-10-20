<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $incidencias = Incidencia::all();
        return view('incidencias.index',['incidencias' => $incidencias]);

    }

    public function mine()
    {
        $user = Auth::user();
        $incidencias = $user->incidencias;
        return view('incidencias.mine', ['incidencias' => $incidencias]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $incidencia = new Incidencia();
            $incidencia->title = $request->title;
            $incidencia->text = $request->text;
            $incidencia->time = $request->time;
            $incidencia->prioridad_id = $request->prioridad_id;
            $incidencia->estado_id = $request->estado_id;
            $incidencia->categoria_id = $request->categoria_id;
            $incidencia->save();
            return redirect()->route('incidencias.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencia $incidencia)
    {
        return view('incidencias.show',['incidencia' => $incidencia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }
}
