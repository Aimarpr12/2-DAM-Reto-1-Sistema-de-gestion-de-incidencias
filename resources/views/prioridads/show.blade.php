@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row header" >
        <div class="col">
            <h1>{{$prioridad->name}}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <p>Creado el {{$prioridad->created_at}}</p>
        </div>
    </div>
    <br>
    @include('plantillas/showIncidenciasList', ['incidencias' => $prioridad->incidencias->sortByDesc('created_at')->take(5)])
    <br>
    <a class="btn btn-primary" href="{{route('prioridads.index')}}" role="button">Prioridad</a>
</div>
@endsection
