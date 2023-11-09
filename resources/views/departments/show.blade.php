@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row header" >
        <div class="col">
            <h1>{{$department->name}}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <p>Creado el {{$department->created_at}}</p>
        </div>
    </div>
    <br>
    @include('layouts/showIncidenciasList', ['incidencias' => $department->user->flatMap(function ($user) {
        return $user->incidencias->sortByDesc('created_at')->take(5);
    })->sortByDesc('created_at')->take(5)])
    <br>
    <a class="btn btn-primary" href="{{route('departments.index')}}" role="button">Departamentos</a>
</div>
@endsection
