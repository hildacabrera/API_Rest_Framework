@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
    @include ('dashboard.partials.validation-error')

    <h1>Editar post</h1>
    <form action="{{ url('dashboard/category/' . $post->id) }}" method="post">
        @method('PUT')

        @csrf
        {{-- form:post --}}
        {{-- fila 1 --}}
        <main>
            <div class="row">
                {{-- .row para crear una fila --}}

                <div class="form-group">
                    <label for="name">Categorias</label>
                    <input class="form-control"type="text" name="name" id="name" value="{{ $post->name }}">
                </div>
            </div>
            {{-- fila 2 --}}
            <div class="row form-group">
                <label for="description">Descripcion</label>
                <textarea class="form-control" name="description" id="" cols="30">{{ $post->description }}</textarea>
            </div>

            {{-- fila 3 --}}
            <div class="row center">
                {{-- Las columnas en bootstrap tiene un ancho de 12 
                    Añadir 2 input en una fila: 12/cantidadinput --}}

                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/category') }}"class="btn btn-secundary btn-sm">cancelar</a>
                </div>

            </div>
            </div>
        </main>
    </form>
@endsection
