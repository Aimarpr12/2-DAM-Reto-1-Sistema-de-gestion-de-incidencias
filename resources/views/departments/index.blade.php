@extends('layouts.app')
@section('content')

<div class="container">
    <div class="scrollable-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Creación</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <td><a href="{{route('departments.show', $department)}}">{{$department->name}}</a></td>
                    <td>{{$department->created_at}}</td>
                    @auth
                    <td class="text-center">
                        <a class="btn btn-warning btn-sm" href="{{route('departments.edit', $department)}}" role="button">Editar</a>
                    </td>
                    <td class="text-center">
                        <form action="{{route('departments.destroy', $department)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <a class="btn btn-primary" href="{{route('departments.create')}}" role="button">Crear</a>
    </div>
</div>
@endsection
