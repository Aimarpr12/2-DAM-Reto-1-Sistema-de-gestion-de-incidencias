@extends('layouts.app')
@section('content')

<div class="container">

    <div id="prioridads" class="row">
        <div class="col">
            <div>
                <b>Prioridad</b>
            </div>
            <br>
            @foreach ($prioridads as $prioridad)
            <div>
                {{$prioridad->name}}
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Num Incidencias</b>
            </div>
            <br>
            @foreach ($prioridads as $prioridad)
            <div>
                @if($prioridad->incidencias)
                    {{$prioridad->incidencias->count()}}

                @else
                    0
                @endif
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Editar</b>
            </div>
            <br>
            @foreach ($prioridads as $prioridad)
            <div>
                <a class="btn btn-warning btn-sm" href="{{route('prioridads.edit', $prioridad)}}" role="button">Editar</a>
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Eliminar</b>
            </div>
            <br>
            @foreach ($prioridads as $prioridad)
            <div>
                <form action="{{route('prioridads.destroy', $prioridad)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </div>
            <br>
            @endforeach
        </div>
    </div>
    <a class="btn btn-primary" href="{{route('prioridads.create')}}" role="button">Crear</a>

</div>

@endsection


