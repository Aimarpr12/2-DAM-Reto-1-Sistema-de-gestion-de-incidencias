<?php

namespace App\Http\Controllers;

use App\Models\Prioridad;
use Illuminate\Http\Request;

class PrioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prioridads = Prioridad::orderBy('created_at')->get();
        return view('prioridads.index',['prioridads' => $prioridads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prioridads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.unique' => 'El nombre de la categoría ya existe.',
        ];

        $request->validate([
            'name' => 'required|unique:prioridads',
        ], $messages);

        $prioridad = new Prioridad();
        $prioridad->name = $request->name;
        $prioridad->save();

        return redirect()->route('prioridads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prioridad $prioridad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prioridad $prioridad)
    {
        return view('prioridads.edit',['prioridad'=>$prioridad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prioridad $prioridad)
    {
        $messages = [
            'name.unique' => 'El nombre de la prioridad ya existe.',
        ];

        $request->validate([
            'name' => 'required|unique:prioridads',
        ], $messages);

        $prioridad->name = $request->input('name');
        $prioridad->save();
        return redirect()->route('prioridads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prioridad $prioridad)
    {
        foreach ($prioridad->incidencias as $incidencia){
            $incidencia->prioridad_id = null;
        }
        $prioridad->delete();
        return redirect()->route('prioridads.index');
    }
}
