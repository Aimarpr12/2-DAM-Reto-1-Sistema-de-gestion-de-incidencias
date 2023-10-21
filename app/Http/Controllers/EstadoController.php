<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::orderBy('created_at')->get();
        return view('estados.index',['estados' => $estados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.unique' => 'El nombre del estado ya existe.',
        ];

        $request->validate([
            'name' => 'required|unique:estados',
        ], $messages);

        $estado = new Estado();
        $estado->name = $request->name;
        $estado->save();

        return redirect()->route('estados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estado $estado)
    {
        return view('estados.edit',['estado'=>$estado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado)
    {
        $messages = [
            'name.unique' => 'El nombre del estado ya existe.',
        ];

        $request->validate([
            'name' => 'required|unique:estados',
        ], $messages);
        $estado->name = $request->input('name');
        $estado->save();
        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estado $estado)
    {
        //
    }
}
