<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        #dd($departments);
        return view('departments.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = new Department();
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.unique' => 'El nombre del departamento ya existe.',
        ];

        $request->validate([
            'name' => 'required|unique:departments',
        ], $messages);

        $department = new Department();
        $department->name = $request->name;
        $department->save();
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $messages = [
            'name.unique' => 'El nombre del departamento ya existe.',
        ];

        $request->validate([
            'name' => 'required|unique:departments',
        ], $messages);

        $department->name = $request->name;
        $department->save();
        return view('departments.show',['department'=>$department]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index');
    }
}
