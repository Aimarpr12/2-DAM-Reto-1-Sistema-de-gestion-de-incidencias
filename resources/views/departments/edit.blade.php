@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform"
        @if ($department->id != null)
            action="{{route('departments.update',$department)}}"
        @else
            action="{{route('departments.store')}}"
        @endif
    method="POST" enctype="multipart/form-data">
    @csrf
    @if ($department->id!= null)
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="name" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="name" name="name" required
        value="{{$department->name}}"/>
    </div>
    @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    <button type="submit" class="btn btn-primary" name="">
        @if ($department->id != null)
            Actualizar
        @else
            Crear
        @endif
        </button>
    </form>
</div>
@endsection
