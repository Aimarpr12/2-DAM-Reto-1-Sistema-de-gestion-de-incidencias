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
    @include('layouts/showIncidenciasList', ['incidencias' => $categoria->incidencias->sortByDesc('created_at')->take(5)])
    <br>
    <a class="btn btn-primary" href="{{route('categorias.index')}}" role="button">Categorias</a>
</div>
@endsection
