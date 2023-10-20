@extends('layouts.app')
@section('content')


<style>
    .scrollable-container {
        height: 70vh;
        overflow-y: auto;
    }
</style>
<div class="container">
    <div class="scrollable-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de creación</th>
                    <th>Numero de comentarios</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                <tr>
                    <td><a href="{{route('incidencias.show', $incidencia)}}">{{$incidencia->title}}</a></td>
                    <td>{{$incidencia->created_at}}</td>
                    <td>{{$incidencia->comentarios->count('id')}}</td>
                    <td>{{$incidencia->prioridad->name}}</td>
                    <td>{{$incidencia->estado->name}}</td>
                    @auth
                    <td class="text-center">
                        <a class="btn btn-warning btn-sm" href="{{route('incidencias.edit', $incidencia)}}" role="button">Editar</a>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <a class="btn btn-primary" href="{{route('incidencias.create')}}" role="button">Crear</a>
    </div>
</div>
@endsection
