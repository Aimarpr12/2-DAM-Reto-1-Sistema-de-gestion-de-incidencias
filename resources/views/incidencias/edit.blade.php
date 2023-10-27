
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="edit_incidencia"
    @if ($incidencia->id != null)
        action="{{route('incidencias.update',$incidencia)}}"
    @else
        action="{{route('incidencias.store')}}"
    @endif

    method="POST" enctype="multipart/form-data">
    @csrf
    @if ($incidencia->id != null)
        @method('PUT')
    @endif
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
    <div class="form-group mb-3">
        <label for="text" class="form-label">Prioridad</label>
        <select class="form-control" id="prioridad_id" name="prioridad_id" required>
            @foreach ($prioridads as $prioridad)
                <option value={{$prioridad->id}}
                    @if($prioridad->id == $incidencia->prioridad_id)
                        selected
                    @endif
                >{{$prioridad->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Estado</label>
        <select class="form-control" id="estado_id" name="estado_id" required>
            @foreach ($estados as $estado)
                <option value={{$estado->id}}
                    @if($estado->id == $incidencia->estado_id)
                        selected
                        @endif
                    >{{$estado->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="text" class="form-label">Categoria</label>
        <select class="form-control" id="categoria_id" name="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value={{ $categoria->id }}
                    @if($categoria->id == $incidencia->categoria_id)
                        selected
                    @endif
                >{{$categoria->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary" name="">
                @if ($incidencia->id != null)
                    Actualizar
                @else
                    Crear
                @endif
            </button>
        </div>
        <div class="col d-flex justify-content-end">
            <button href="{{route('incidencias.index')}}" class="btn btn-secondary" name="">Atras</button>
        </div>
    </div>
    </form>
</div>
@endsection
