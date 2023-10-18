@extends('layouts.app')
@section('content')


<ul>
    {{--esto es un comentario: recorremos el listado de posts--}}
    @foreach ($posts as $post)
        {{-- visualizamos los atributos del objeto --}}
        <li>
            <a href="{{route('posts.show',$post)}}"> {{$post->title}}</a>
             {{$post->titulo}} <a class="btn btn-warning btn-sm" href="{{route('posts.edit',$post)}}"
role="button">Editar</a>

        </li>
    @endforeach
    <a class="btn btn-primary" href="{{route('posts.create')}}" role="button">Crear</a>
    
</ul>
@endsection
