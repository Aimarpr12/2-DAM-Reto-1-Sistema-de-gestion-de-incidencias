
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="edit_comet"
        @if ($categoria->id!= null)
            action="{{route('categorias.update',$categoria)}}"
        @else
            action="{{route('categorias.store')}}"
        @endif
    method="POST" enctype="multipart/form-data">
    @csrf
    @if ($categoria->id!= null)
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="name" class="form-label">Inserte nombre de la categoria:</label>
        <input type="text" class="form-control" id="name" name="name" required
        value="{{$categoria->name}}"/>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary" name="">
        @if ($categoria->id!= null)
            Actualizar
        @else
            Crear
        @endif
    </button>
    </form>
</div>
@endsection
