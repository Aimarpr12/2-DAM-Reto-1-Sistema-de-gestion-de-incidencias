@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_categoria"
    action="{{route('categorias.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">Inserte nombre de la categoria:</label>
        <input type="text" class="form-control" id="name" name="name" required/>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection
