
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="edit_comet"
        @if ($comentario->id != null)
            action="{{route('comentarios.update',$comentario)}}"
        @else
            action="{{route('comentarios.store', ['id' => $comentario->incidencia_id])}}"
        @endif
    method="POST" enctype="multipart/form-data">
    @csrf
    @if ($comentario->id != null)
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="name" class="form-label">Inserte nombre del comentario:</label>
        <input type="text" class="form-control" id="text" name="text" required
        value="{{$comentario->text}}"/>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">Tiempo:</label>
        <input type="number" class="form-control" id="time" name="time" required
        value="{{$comentario->time}}"/>
    </div>

    <button type="submit" class="btn btn-primary" name="">
        @if ($comentario->id != null)
            Actualizar
        @else
            Crear
        @endif

    </button>
    </form>
</div>
@endsection
