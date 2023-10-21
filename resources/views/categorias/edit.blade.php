
@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="edit_comet"
    action="{{route('categorias.update',$categoria)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="name" class="form-label">Inserte nombre de la categoria:</label>
        <input type="text" class="form-control" id="name" name="name" required
        value="{{$categoria->name}}"/>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection
