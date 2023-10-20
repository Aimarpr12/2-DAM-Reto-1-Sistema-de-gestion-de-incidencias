@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$incidencia->title}}</h1>
    <div class="container">
        <div class="row ">
            <div class="col">
                <p>La incidencia se creo el: {{$incidencia->created_at}}</p>
            </div>
            <div class="col">
                <p>La incidencia se modifico por ultima vez el: {{$incidencia->updated_at ?? 'NUNCA'}}</p>
            </div>
        </div>
        <div class="row custom-bg">
            <div class="col-md-9 custom-col">
                <p>{{$incidencia->text}}</p>
                <div class="comentarios">
                    @foreach ($incidencia->comentarios as $comentario)
                        <div class="row comentario">
                            <div class="col-md-2">
                                {{$comentario->user->name}}
                            </div>
                            <div class="col-md-9 txtComentario">
                                {{$comentario->text}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class='{{$incidencia->estado->name}}'>
                    Estado: {{$incidencia->estado->name}}
                </div>
                <div class="cat-prio">
                    Categoria: {{$incidencia->categoria->name}}
                </div>
                <div class="cat-prio">
                    Prioridad: {{$incidencia->prioridad->name}}
                </div>
            </div>
        </div>
    </div>



    <a class="btn btn-primary" href="{{route('incidencias.index')}}" role="button">Incidencias</a>
</div>
@endsection
