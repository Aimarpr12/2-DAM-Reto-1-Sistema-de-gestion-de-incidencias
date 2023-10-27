@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform"
    @if ($prioridad->id != null)
        action="{{route('prioridads.update',$prioridad)}}"
    @else
        action="{{route('prioridads.store')}}"
    @endif
    method="POST" enctype="multipart/form-data">
    @csrf
    @if ($prioridad->id != null)
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required
        value="{{$prioridad->name}}"/>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary" name="">
        @if ($prioridad->id != null)
            Actualizar
        @else
            Crear
        @endif
    </button>
    </form>
</div>
@endsection
