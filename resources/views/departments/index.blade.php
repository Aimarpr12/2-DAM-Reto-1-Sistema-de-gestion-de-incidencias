@extends('layouts.app')
@section('content')


<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($departments as $department)
        {{-- visualizamos los atributos del objeto --}}
        <li>
<a href="{{route('departments.show',$department)}}"> {{$department->titulo}}</a>.
Escrito el {{$department->created_at}}
</li>
    @endforeach
    <a href="/posts"> 
      <button>Ir a otra página</button>
</ul>
@endsection