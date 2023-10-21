@extends('layouts.app')
@section('content')

<div class="container">

    <div id="estados" class="row">
        <div class="col">
            <div>
                <b>Estado</b>
            </div>
            <br>
            @foreach ($estados as $estado)
            <div>
                {{$estado->name}}
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Num Incidencias</b>
            </div>
            <br>
            @foreach ($estados as $estado)
            <div>
                @if($estado->incidencias)
                    {{$estado->incidencias->count()}}

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
            @foreach ($estados as $estado)
            <div>
                <a class="btn btn-warning btn-sm" href="{{route('estados.edit', $estado)}}" role="button">Editar</a>
            </div>
            <br>
            @endforeach
        </div>
    </div>
    <a class="btn btn-primary" href="{{route('estados.create')}}" role="button">Crear</a>

</div>

@endsection


