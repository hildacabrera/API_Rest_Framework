@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
@include ('dashboard.partials.validation-error')
    
    <form action="{{ route('category.store') }}" method="post">

        @csrf
        {{-- form:post --}}
        {{-- fila 1 --}}
        <main>
            <div class="row">
                <h1>Registrar Categoria</h1>
                {{-- .row para crear una fila --}}

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control"type="text" name="name" id="name">
                </div>
            </div>
            {{-- fila 2 --}}
            <div class="row form-group">
                <label for="description">descripcion</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>

            {{-- fila 3 --}}
            <div class="row center">
                {{-- Las columnas en bootstrap tiene un ancho de 12 
                    Añadir 2 input en una fila: 12/cantidadinput --}}
                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                    <a href="{{ url('dashboard/category') }}"class="btn btn-secundary btn-sm">cancelar</a>
                </div>
            </div>
            </div>
        </main>
    </form>
@endsection
