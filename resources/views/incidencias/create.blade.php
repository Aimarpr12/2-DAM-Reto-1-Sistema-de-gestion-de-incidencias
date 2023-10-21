@extends('layouts.app')
@section('content')

<div class="container">
    <form class="mt-2" name="create_incidencias"
    action="{{route('incidencias.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="title" class="form-label">titulo</label>
        <input type="text" class="form-control" id="title" name="title" required/>
        <label for="text" class="form-label">Descripcion</label>
        <textarea class="form-control" id="text" name="text" required></textarea>
        <label for="time" class="form-label">tiempo estimado</label>
        <input type="number" class="form-control" id="time" name="time" required/>
        <label for="text" class="form-label">Prioridad</label>
        <select class="form-control" id="prioridad_id" name="prioridad_id" required>
            @foreach ($prioridads as $prioridad)
                <option value={{$prioridad->id}}>{{$prioridad->name}}</option>
            @endforeach
        </select>
        <label for="text" class="form-label">Estado</label>
        <select class="form-control" id="estado_id" name="estado_id" required>
            @foreach ($estados as $estado)
                <option value={{$estado->id}}>{{$estado->name}}</option>
            @endforeach
        </select>
        <label for="text" class="form-label">Categoria</label>
        <select class="form-control" id="categoria_id" name="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value={{$categoria->id}}>{{$categoria->name}}</option>
            @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>

@endsection
