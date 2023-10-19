@extends('layouts.app')
@section('content')

<ul>
{{--esto es un comentario: recorremos el listado de posts--}}
@foreach ($categorias as $categoria)
{{-- visualizamos los atributos del objeto --}}
<li>
<a href="{{route('categorias.show',$categoria)}}"> {{$categoria->name}}</a>.
{{$categoria->name}} 
             

        </li>
    @endforeach
    <a class="btn btn-primary" href="{{route('categorias.create')}}" role="button">Crear</a>
    
</ul>
@endsection


