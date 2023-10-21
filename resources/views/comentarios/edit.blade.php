
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="edit_comet"
    action="{{route('comentarios.update',$comentario)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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

    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection
