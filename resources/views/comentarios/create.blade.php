
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_departments"
    action="{{route('comentarios.store', ['id' => $incidencia_id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $incidencia_id }}">
    <div class="form-group mb-3">
        <label for="name" class="form-label">Inserte nombre del comentario:</label>
        <input type="text" class="form-control" id="text" name="text" required/>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">Tiempo:</label>
        <input type="number" class="form-control" id="time" name="time" required/>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection
