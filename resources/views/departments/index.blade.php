@extends('layouts.app')
@section('content')

<div class="container">
        <div id="departamentos" class="col">
            <div class="row header">
                <div class="col-md-10">
                    <h1><b>Departamentos</b></h1>
                </div>
                <div class="col-md-1 d-flex justify-content-end">
                    @auth
                    <a href="{{route('departments.create')}}" role="button">
                        <i class="bi bi-file-earmark-plus icono-grande"></i>
                    </a>
                    @endauth
                </div>
            </div>
            <hr style="border: none; border-top: 3px solid #000000; width: 92%;">
            <div class="row">
                <div class="col-md-1 d-flex justify-content-center">
                    <b>Ver</b>
                </div>
                <div class="col">
                    <b>Nombre</b>
                </div>
                <div class="col">
                    <b>Fecha de Creación</b>
                </div>
                <div class="col">
                    <b>Usuarios</b>
                </div>
                <div class="col d-flex justify-content-center">
                    <b>Editar</b>
                </div>
                <div class="col d-flex justify-content-center">
                    <b>Eliminar</b>
                </div>
                <div class="col">
                    <b>Mostrar incidencias</b>
                </div>
            </div>
            @foreach ($departments  as $department)
                <div class="categoria">
                    <div class="row">
                        <div class="col-md-1 d-flex justify-content-center">
                            <a href="{{route('departments.show', $department)}}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                        <div class="col">
                            {{$department->name}}
                        </div>
                        <div class="col">
                            {{$department->created_at}}
                        </div>
                        <div class="col">
                            {{$department->user->count()}}
                        </div>
                        <div class="col d-flex justify-content-center">
                            @auth
                            <a href="{{route('departments.edit', $department)}}" role="button">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            @endauth
                        </div>
                        <div class="col d-flex justify-content-center">
                            @auth

                            @if($department->user->count()== 0 && $department->incidencias->count() == 0)
                            <form action="{{route('departments.destroy', $department)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button style="border: none; background: none; " type="submit" onclick="return confirm('¿Estás seguro?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            @endif
                            @endauth
                        </div>
                        <div class="col d-flex justify-content-center">
                            @if($department->user->sum(function ($user) {
                                return $user->incidencias->count();
                            }) > 0)
                            <button style="border: none; background: none;" class="toggle-incidencias btn btn-primary btn-sm" data-target=".incidencias">
                                <img class="mostrar-image img" src="images/mostrar.ico" alt="Mostrar" style="display: none; width: 30px; height: 30px;">
                                <img class="ocultar-image img" src="images/ocultar.ico" alt="Ocultar" style="display: block; width: 20px; height: 20px;">
                            </button>
                            @endif
                        </div>
                    </div>
                    @if($department->incidencias->count()>0)
                    <div class="incidencias col-md-10" style="display: block" >
                        @include('layouts/showIncidenciasList', ['incidencias' => $department->incidencias->sortByDesc('created_at')->take(5)])
                    </div>
                @endif
                </div>
            @endforeach
    </div>
</div>
@endsection
