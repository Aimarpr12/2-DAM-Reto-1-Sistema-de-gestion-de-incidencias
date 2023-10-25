@extends('layouts.app')
@section('content')

<div class="container">

    <div id="estados" class="col">
        <div class="row header">
            <div class="col-md-10">
                <b>Estado</b>
            </div>
            <div class="col-md-1 d-flex justify-content-end">
                @auth
                <a href="{{route('estados.create')}}" role="button">
                    <i class="bi bi-file-earmark-plus"></i>
                </a>
                @endauth
            </div>
        </div>
        <hr style="border: none; border-top: 3px solid #000000; width: 92%;">
        <div class="row">
            <div class="col">
                <b>Nombre</b>
            </div>
            <div class="col">
                <b>Num Incidencias</b>
            </div>
            <div class="col">
                <b>Editar</b>
            </div>
            <div class="col">
                <b>Eliminar</b>
            </div>
            <div class="col">
                <b>Mostrar incidencias</b>
            </div>
        </div>
        @foreach ($estados as $estado)
            <div class="categoria">
                <div class="row">
                    <div class="col">
                        {{$estado->name}}
                    </div>
                    <div class="col">
                        @if($estado->incidencias)
                            {{$estado->incidencias->count()}}
                        @else
                            0
                        @endif
                    </div>
                    <div class="col">
                        <a href="{{route('estados.edit', $estado)}}" role="button">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                    <div class="col">
                        <form action="{{route('estados.destroy', $estado)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button style="border: none; background: none; " type="submit" onclick="return confirm('¿Estás seguro?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col d-flex justify-content-center">
                        @if($estado->incidencias->count()>0)
                        <button style="border: none; background: none;" class="toggle-incidencias btn btn-primary btn-sm" data-target=".incidencias">
                            <img class="mostrar-image" src="images/mostrar.ico" alt="Mostrar" style="display: block; width: 30px; height: 30px;">
                            <img class="ocultar-image" src="images/ocultar.ico" alt="Ocultar" style="display: none; width: 20px; height: 20px;">
                        </button>
                        @endif
                    </div>
                </div>
                @if($estado->incidencias->count()>0)
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
                        @foreach ($estado->incidencias->sortByDesc('created_at')->take(5) as $incidencia)
                            <div class="row">

                                <div class="col-md-1 d-flex justify-content-center">
                                    <a href="{{route('incidencias.show', $incidencia)}}">
                                        <i class="bi bi-eye"></i>
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
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</div>

@endsection


