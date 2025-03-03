@extends('plantillas.plantilla1')

@section('titulo')
    {{ $titulo }}
@endsection

@section('encabezado')
    {{ $encabezado }}
@endsection

@section('contenido')
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Código</th>
                <th>Nombre</th>
                <th>Nombre Corto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="text-center">
                    <th>{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->nombre_corto }}</td>
                    <td class="{{ $producto->pvp > 100 ? 'text-danger' : 'text-success' }}">
                        {{ $producto->pvp }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('enlace')
    familias.php
@endsection

@section('textoEnlace')
    Ver Familias
@endsection
