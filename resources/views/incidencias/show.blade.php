@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row header">
        <div class="col">
            <h1>{{$incidencia->title}}</h1>
        </div>
        <div class="col-md-1 d-flex justify-content-end">
            <a class="btn" href="{{route('incidencias.index')}}" role="button">
                <i class="bi bi-arrow-left icono-grande"></i>
            </a>
        </div>
    </div>
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
                @auth
                <div class="newComet colum">
                    <div>
                        <label for="comentario">Comentarios:</label>
                    </div>
                </div>
                <br>
                <div class="scrool-comentarios">
                    @include('layouts/comentarios', ['incidencia' => $incidencia ])
                </div>
                @if(auth()->user()->department->id == $incidencia->user->department->id)
                    <form class="mt-2" name="create_departments"
                    action="{{route('comentarios.store', ['id' => $incidencia->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div>
                            <label>
                                <b>Nuevo comentario:</b>
                            </label>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col form-group mb-3">
                                <label for="name" class="form-label">Inserte el comentario:</label>
                                <input type="text" class="form-control" id="text" name="text" required/>
                            </div>
                            <div class="col form-group mb-3">
                                <label for="name" class="form-label">Tiempo:</label>
                                <input type="number" class="form-control" id="time" name="time" required/>
                            </div>
                            <div class="col-md-1">
                                <br>
                                <button type="submit" style="background-color: transparent; border-color: transparent">
                                    <i class="bi bi-file-earmark-plus icono-grande"></i>
                                </button>

                            </div>
                        </div>
                    </form>
                @endif
                @endauth
            </div>
            <div class="col-md-3">
                <div class="cat-prio">
                    @if ($incidencia->estado !== null && $incidencia->estado->name !== null)
                        Estado: {{$incidencia->estado->name}}
                    @else
                        Estado: <span class="error"><b>Vacio</b></span>
                    @endif
                </div>
                <div class="cat-prio">
                    @if ($incidencia->categoria !== null && $incidencia->categoria->name !== null)
                    Categoria: {{$incidencia->categoria->name}}
                    @else
                    Categoria: <span class="error"><b>Vacio</b></span>
                    @endif
                </div>

                <div class="cat-prio">
                    @if ($incidencia->prioridad !== null && $incidencia->prioridad->name !== null)
                    Prioridad: {{$incidencia->prioridad->name}}
                    @else
                    Prioridad: <span class="error"><b>Vacio</b></span>
                    @endif
                </div>
                <br>
                @auth
                @if(auth()->user()->id == $incidencia->user->id)
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{route('incidencias.edit', $incidencia)}}" role="button">
                            <i class="bi bi-pencil-square icono-grande "></i>
                        </a>
                    </div>
                    <br>
                    <div class="col">
                        <form action="{{route('incidencias.destroy', $incidencia)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button style="border: none; background: none; " type="submit" onclick="return confirm('¿Estás seguro?')">
                                <i class="bi bi-trash3 icono-grande"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
