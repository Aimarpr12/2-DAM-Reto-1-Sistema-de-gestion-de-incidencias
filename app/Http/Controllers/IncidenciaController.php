<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Prioridad;
use App\Models\Estado;
use App\Models\Categoria;
use App\Models\Auth;
use App\Models\Department;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $incidencias = Incidencia::orderBy('created_at', 'desc')->get();
        return view('incidencias.index',['incidencias' => $incidencias]);

    }

    /**
     * Display the specified resource.
     */
    public function mine()
    {
        return view('incidencias.mine');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = Department::all();
        $incidencia = new Incidencia();
        $prioridad = Prioridad::all();
        $estado = Estado::all();
        $categoria = Categoria::all();
        return view('incidencias.edit', [
            'incidencia'=>$incidencia,
            'prioridads' => $prioridad,
            'estados' => $estado,
            'categorias' => $categoria,
            'departments' => $department
        ]);
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
            $incidencia->department_id = $request->department_id;
            $incidencia->categoria_id = $request->categoria_id;
            $incidencia->user_id = auth()->user()->id;
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
        if(auth()->user()->id!= $incidencia->user_id){
            $incidencias = Incidencia::orderBy('created_at', 'desc')->get();
            return redirect()->route('incidencias.index', ['incidencias' => $incidencias]);
        }
        $department = Department::all();
        $prioridad = Prioridad::all();
        $estado = Estado::all();
        $categoria = Categoria::all();
        return view('incidencias.edit', [
            'incidencia'=>$incidencia,
            'prioridads' => $prioridad,
            'estados' => $estado,
            'categorias' => $categoria,
            'departments' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        $request->validate([
            'text' => 'required|string',
            'title' => 'required|string',
            'time' => 'required|integer',
        ]);

        $incidencia->title = $request->title;
        $incidencia->text = $request->text;
        $incidencia->time = $request->time;
        $incidencia->prioridad_id = $request->prioridad_id;
        $incidencia->estado_id = $request->estado_id;
        $incidencia->department_id = $request->department_id;
        $incidencia->categoria_id = $request->categoria_id;
        $incidencia->save();

        return redirect()->route('incidencias.show', ['incidencia' => $incidencia->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();
        return redirect()->route('incidencias.index');
    }
}
