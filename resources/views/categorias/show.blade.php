@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row header" >
        <div class="col">
            <h1>{{$categoria->name}}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <p>Creado el {{$categoria->created_at}}</p>
        </div>
    </div>
    <br>
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
        @foreach ($categoria->incidencias->sortByDesc('created_at')->take(5) as $incidencia)
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
    <br>
    <a class="btn btn-primary" href="{{route('categorias.index')}}" role="button">Categorias</a>
</div>
@endsection
