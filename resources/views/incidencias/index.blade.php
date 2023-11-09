@extends('layouts.app')
@section('content')

<div class="container">
    <div id="categorias" class="col">
        <div class="row header">
            <div class="col-md-10">
                <h1><b>Incidencias</b></h1>
            </div>
            <div class="col-md-1 d-flex justify-content-end">
                @auth
                <a href="{{route('incidencias.create')}}" role="button">
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
            <div class="col-md-2">
                <b>Nombre</b>
            </div>
            <div class="col-md-2">
                <b>Fecha de creación</b>
            </div>
            <div class="col-md-2">
                <b>Ult. Fecha de modificación</b>
            </div>
            <div class="col-md-1">
                <b>Comentarios</b>
            </div>
            <div class="col-md-1">
                <b>Prioridad</b>
            </div>
            <div class="col-md-1">
                <b>Categoria</b>
            </div>
            <div class="col-md-1">
                <b>Estado</b>
            </div>
            <div class="col-md-1">
                @auth
                <b>Editar</b>
                @endauth
            </div>
        </div>
        @foreach ($incidencias as $incidencia)
            <div class="categoria">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center">
                        <a href="{{route('incidencias.show', $incidencia)}}">
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                    <div class="col-md-2">
                        {{$incidencia->title}}
                    </div>
                    <div class="col-md-2">
                        {{$incidencia->created_at}}
                    </div>
                    <div class="col-md-2">
                        {{$incidencia->updated_at}}
                    </div>
                    <div class="col-md-1">
                        {{$incidencia->comentarios->count('id')}}
                    </div>
                    <div class="col-md-1">
                        @if ($incidencia->prioridad !== null && $incidencia->prioridad->name !== null)
                            {{$incidencia->prioridad->name}}
                        @else
                            <span class="error"><b>Vacio</b></span>
                        @endif
                    </div>
                    <div class="col-md-1">
                        @if ($incidencia->categoria !== null && $incidencia->categoria->name !== null)
                            {{$incidencia->categoria->name}}
                        @else
                            <span class="error"><b>Vacio</b></span>
                        @endif
                    </div>
                    <div class="col-md-1">
                        @if ($incidencia->estado !== null && $incidencia->estado->name !== null)
                            {{$incidencia->estado->name}}
                        @else
                            <span class="error"><b>Vacio</b></span>
                        @endif
                    </div>
                    @auth
                        @if(auth()->user()->id == $incidencia->user->id)
                            <div class="col-md-1 d-flex justify-content-center">
                                <a href="{{route('incidencias.edit', $incidencia)}}" role="button">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
