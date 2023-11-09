@foreach ($incidencia->comentarios as $comentario)
    <div class="row comentario comentario-centrado">
        <div class="col-md-2">
            <div>
                {{$comentario->user->name}}
            </div>
            <div>
                <span style="font-size: 10px;">{{$comentario->created_at}}</span>
            </div>
        </div>
        <div class="col-md-7 txtComentario">
            {{$comentario->text}}
        </div>
        <div class="col-md-1">
            {{$comentario->time}}
        </div>
        <div class="col-md-1 txtComentario">
            @if(auth()->user()->id == $comentario->user->id)
                <a href="{{route('comentarios.edit', $comentario)}}" role="button">
                    <i class="bi bi-pencil-square icono-grande"></i>
                </a>
            @endif
        </div>
        <div class="col-md-1 txtComentario" >
            @if(auth()->user()->id == $incidencia->user->id)
                <form action="{{route('comentarios.destroy', $comentario)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border: none; background: none;" onclick="return confirm('¿Estás seguro?')">
                        <i class="bi bi-trash3 icono-grande"></i>
                    </button>
                </form>
            @endif
        </div>
    </div>
@endforeach
