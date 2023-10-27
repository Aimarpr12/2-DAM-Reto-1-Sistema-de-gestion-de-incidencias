@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_categoria"
        @if($estado->id != null)
            action="{{route('estados.update',$estado)}}"
        @else
            action="{{route('estados.store')}}"
        @endif

    method="POST" enctype="multipart/form-data">

    @if($estado->id != null)
        @method('PUT')
    @endif

    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required
        value="{{$estado->name}}"/>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary" name="">
        @if($estado->id!= null)
            Actualizar
        @else
            Crear
        @endif
    </button>
</div>
@endsection
