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
                    <th>Categoria</th>
                    <th>Estado</th>
                    @auth
                        <th>Editar</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                <tr>
                    <td><a href="{{route('incidencias.show', $incidencia)}}">{{$incidencia->title}}</a></td>
                    <td>{{$incidencia->created_at}}</td>
                    <td>{{$incidencia->comentarios->count('id')}}</td>
                    <td>
                        @if ($incidencia->prioridad !== null && $incidencia->prioridad->name !== null)
                            {{$incidencia->prioridad->name}}
                        @else
                            <span style="color: red;"><b>null</b></span>
                        @endif
                    </td>
                    <td>
                        @if ($incidencia->categoria !== null && $incidencia->categoria->name !== null)
                            {{$incidencia->categoria->name}}
                        @else
                            <span style="color: red;"><b>null</b></span>
                        @endif
                    </td>
                    <td>{{$incidencia->estado->name}}</td>
                    @auth
                        @if(auth()->user()->id == $incidencia->user->id)
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" href="{{route('incidencias.edit', $incidencia)}}" role="button">Editar</a>
                            </td>
                        @endif
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @auth
        <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-primary" href="{{route('incidencias.create')}}" role="button">Crear</a>
        </div>
    @endauth
</div>
@endsection
