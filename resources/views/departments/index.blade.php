@extends('layouts.app')
@section('content')

<div class="container">
        <div id="departamentos" class="col">
            <div class="row header">
                <div class="col-md-10">
                    <b>Departamento</b>
                </div>
                <div class="col-md-1 d-flex justify-content-end">
                    @auth
                    <a href="{{route('departments.create')}}" role="button">
                        <img class="mostrar-image" src="images/new.ico" alt="Crear" style="display: block; width: 30px; height: 30px;">
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
                                <img class="mostrar-image img" src="images/eye.ico" alt="Ver" style="display: block; width: 30px; height: 30px;">
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
                            <a href="{{route('departments.edit', $department)}}" role="button">
                                <img class="mostrar-image img" src="images/edit.ico" alt="Edit" style="display: block; width: 30px; height: 30px;">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            @if($department->user->count()== 0)
                                <form action="{{route('departments.destroy', $department)}}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button style="border: none; background: none; " type="submit" onclick="return confirm('¿Estás seguro?')">
                                        <img class="mostrar-image img" src="images/delete.ico" alt="Eliminar" style="display: block; width: 30px; height: 30px; ">
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="col d-flex justify-content-center">
                            @if($department->user->sum(function ($user) {
                                return $user->incidencias->count();
                            }) > 0)
                            <button style="border: none; background: none;" class="toggle-incidencias btn btn-primary btn-sm" data-target=".incidencias">
                                <img class="mostrar-image img" src="images/mostrar.ico" alt="Mostrar" style="display: block; width: 30px; height: 30px;">
                                <img class="ocultar-image img" src="images/ocultar.ico" alt="Ocultar" style="display: none; width: 20px; height: 20px;">
                            </button>
                            @endif
                        </div>
                    </div>
                    @if ($department->user->sum(function ($user) {
                        return $user->incidencias->count();
                    }) > 0)
                        <div class="incidencias col-md-10" style="display: none" >
                            <div class="col-md-11">
                                <b style="font-size: 20px">Incidencias:</b>
                            </div>
                            <div class="row">
                                <div class="col-md-1 d-flex justify-content-center">
                                    <b>Ver</b>
                                </div>
                                <div class="col">
                                    <b>Nombre</b>
                                </div>
                                <div class="col">
                                    <b>Fecha de creación</b>
                                </div>
                                <div class="col">
                                    <b>Nº Comentarios</b>
                                </div>
                                <div class="col">
                                    <b>Prioridad</b>
                                </div>
                                <div class="col">
                                    <b>Estado</b>
                                </div>
                            </div>
                            @foreach ($department->user as $user)
                                @foreach ($user->incidencias->sortByDesc('created_at')->take(5) as $incidencia)
                                <div class="row">
                                    <div class="col-md-1 d-flex justify-content-center">
                                        <a href="{{route('incidencias.show', $incidencia)}}">
                                            <img class="mostrar-image" src="images/eye.ico" alt="Ver" style="display: block; width: 30px; height: 30px;">
                                        </a>
                                    </div>
                                    <div class="col">
                                        {{$incidencia->title}}
                                    </div>
                                    <div class="col">
                                        {{$incidencia->created_at}}
                                    </div>
                                    <div class="col">
                                        {{$incidencia->comentarios->count('id')}}
                                    </div>
                                    <div class="col">
                                        @if ($incidencia->prioridad !== null && $incidencia->prioridad->name !== null)
                                            {{$incidencia->prioridad->name}}
                                        @else
                                            <span style="color: red;"><b>null</b></span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        {{$incidencia->estado->name}}
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
    </div>
</div>
@endsection
