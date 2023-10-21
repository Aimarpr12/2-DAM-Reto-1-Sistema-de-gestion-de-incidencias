
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="edit_incidencia"
    action="{{route('incidencias.update',$incidencia)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="title" class="form-label">Inserte nombre de la incidencia:</label>
        <input type="text" class="form-control" id="title" name="title" required
        value="{{$incidencia->title}}"/>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Inserte texto de la incidencia:</label>
        <input type="text" class="form-control" id="text" name="text" required
        value="{{$incidencia->text}}"/>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">Tiempo:</label>
        <input type="number" class="form-control" id="time" name="time" required
        value="{{$incidencia->time}}"/>
    </div>

    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary" name="">Actualizar</button>
        </div>
        <div class="col d-flex justify-content-end">
            <button href="{{route('incidencias.show', ['incidencia' => $incidencia->id])}}" class="btn btn-secondary" name="">Atras</button>
        </div>
    </div>
    </form>
</div>
@endsection
