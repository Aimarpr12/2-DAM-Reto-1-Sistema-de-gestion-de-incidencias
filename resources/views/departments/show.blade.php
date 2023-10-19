@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$department->name}}</h1>
    <p>Creado el {{$department->created_at}}</p>
    <a class="btn btn-primary" href="{{route('departments.index')}}" role="button">Departamentos</a>
</div>
@endsection
