@extends('dashboard.master')
@section('titulo','AgregarPost')
@section('contenido')
    @include ('dashboard.partials.validation-error')

    <h1>Registrar post</h1>
    <form action="{{route('post.store')}}" method="post">

        @csrf
        {{-- form:post --}}
        {{-- fila 1 --}}
        <main>
            <div class="row">
                {{-- .row para crear una fila --}}

                <div class="form-group">
                    <label for="name">Articulo</label>
                    <input class="form-control"type="text" name="name" id="name">
                </div>
            </div>
            {{-- fila 2 --}}
            <div class="row form-group">
                <label for="description">Contenido</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            {{-- fila 3 --}}
            <div class="row form-group">
                <label for="description">Categoria</label>
                <select name="category" id="category">
                    <option value="">Selecionar categorias</option>
                    @foreach ($category as $category)
                    <option value="{{ $category->id}}"> {{ $category->name }} </option>
                        
                    @endforeach
                </select>
            </div>

            {{-- fila 4 --}}
            <div class="row center">
                {{-- Las columnas en bootstrap tiene un ancho de 12 
                    Añadir 2 input en una fila: 12/cantidadinput --}}

                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                    <a href="{{url('dashboard/post') }}"class="btn btn-secundary btn-sm">cancelar</a>

                </div>
            </div>
            </div>
        </main>
    </form>
@endsection
