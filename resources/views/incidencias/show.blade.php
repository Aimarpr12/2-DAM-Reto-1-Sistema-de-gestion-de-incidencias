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
                    <div>
                        <b>Incidencia:</b>
                    </div>
                    <div>
                        <p>{{$incidencia->text}}</p>
                    </div>
                    <!--<div class="newComet colum">
                        <div>
                            <label for="comentario">Comentarios:</label>
                        </div>
                        <div class="row">
                            <form method="POST" action={{ route('comentarios.store', ['id' => $incidencia->id]) }}">
                                @csrf
                                <div class="col-md-8">
                                    <textarea name="comentario" class="comment-text" placeholder="Escribe tu comentario aquí"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    -->
                    @auth
                    <div class="row">
                        <div class="col-md-1">
                            <b>Comentarios:</b>
                        </div>
                        @if(auth()->user()->department->id == $incidencia->user->department->id)
                            <div class="col-md-9 d-flex justify-content-end">
                                <a class="btn btn-primary" href="{{route('comentarios.create', ['id' => $incidencia->id])}}" role="button">Crear Comentario</a>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="scrool-comentarios">
                        @foreach ($incidencia->comentarios as $comentario)
                            <div class="row comentario comentario-centrado">
                                <div class="col-md-2">
                                    <div>
                                        {{$comentario->user->name}}
                                    </div>
                                    <div>
                                        <span style="font-size: 10px;">{{$comentario->created_at}}</span>
                                    </div>
                                </div>
                                <div class="col-md-7 txtComentario">
                                    {{$comentario->text}}
                                </div>
                                <div class="col-md-1">
                                    {{$comentario->time}}
                                </div>
                                <div class="col-md-1 txtComentario">
                                    @if(auth()->user()->id == $comentario->user->id)
                                        <a class="btn btn-warning btn-sm" href="{{route('comentarios.edit', $comentario)}}" role="button">Editar</a>
                                    @endif
                                </div>
                                <div class="col-md-1 txtComentario">
                                    @if(auth()->user()->id == $incidencia->user->id)
                                        <form action="{{route('comentarios.destroy', $comentario)}}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endauth
                </div>
                <div class="col-md-3">
                    <div class='{{$incidencia->estado->name}}'>
                        Estado: {{$incidencia->estado->name}}
                    </div>
                    <div class="cat-prio">
                        @if ($incidencia->categoria !== null && $incidencia->categoria->name !== null)
                            Categoria: {{$incidencia->categoria->name}}
                        @else
                            Categoria: <span style="color: red;"><b>null</b></span>
                        @endif
                    </div>

                    <div class="cat-prio">
                        @if ($incidencia->prioridad !== null && $incidencia->prioridad->name !== null)
                            Prioridad: {{$incidencia->prioridad->name}}
                        @else
                            Prioridad: <span style="color: red;"><b>null</b></span>
                        @endif
                    </div>
                    <br>
                    @auth
                        @if(auth()->user()->id == $incidencia->user->id)
                            <div>
                                <a class="btn btn-warning btn-sm" href="{{route('incidencias.edit', $incidencia)}}" role="button">Editar</a>
                            </div>
                            <br>
                            <div>
                                <form action="{{route('incidencias.destroy', $incidencia)}}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        <br>
        <a class="btn btn-primary" href="{{route('incidencias.index')}}" role="button">Incidencias</a>
</div>
@endsection
