@extends('dashboard.master')
@section('titulo','Mensaje ok')
@section('contenido')

<h1>Mensaje</h1>

<div class="container py 4">
    <h2>
        {{ $msg }}
        <a href="{{url('dashboard/category')}}" class="btn btn-secondary btn-sm">Regresar</a>
    </h2>
</div>
@endsection