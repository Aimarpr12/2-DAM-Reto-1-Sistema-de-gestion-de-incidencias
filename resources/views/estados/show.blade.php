@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row header" >
        <div class="col">
            <h1>{{$estado->name}}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <p>Creado el {{$estado->created_at}}</p>
        </div>
    </div>
    <br>
    @include('layouts/showIncidenciasList', ['incidencias' => $estado->incidencias->sortByDesc('created_at')->take(5)])
    <br>
    <a class="btn btn-primary" href="{{route('estados.index')}}" role="button">Estados</a>
</div>
@endsection
