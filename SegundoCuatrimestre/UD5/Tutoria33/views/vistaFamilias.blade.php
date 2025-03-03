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
                <th>Código de barras</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($familias as $familia)
                <tr class="text-center">
                    <th>{{ $familia->cod }}</th>
                    <td>{{ $familia->nombre }}</td>
                    <td><img src="data:image/png;base64,{{ $barcodes["$familia->cod"] }}" alt="Código de barras"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('enlace')
    productos.php
@endsection

@section('textoEnlace')
    Ver Productos
@endsection
