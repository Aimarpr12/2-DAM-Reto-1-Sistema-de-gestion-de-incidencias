@extends('layouts.app')
@section('content')

<div class="container">
    <div class="scrollable-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Creación</th>
                    <th>Usuarios</th>
                    @auth
                        <th>Editar</th>
                        <th>Eliminar</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <td><a href="{{route('departments.show', $department)}}">{{$department->name}}</a></td>
                    <td>{{$department->created_at}}</td>
                    <td>
                        {{$department->user->count()}}
                    </td>
                    @auth
                    <td class="text-center">
                        <a class="btn btn-warning btn-sm" href="{{route('departments.edit', $department)}}" role="button">Editar</a>
                    </td>
                    <td class="text-center">
                        @if($department->user->count()== 0)
                            <form action="{{route('departments.destroy', $department)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        @endif
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @auth
        <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-primary" href="{{route('departments.create')}}" role="button">Crear</a>
        </div>
    @endauth
</div>
@endsection
