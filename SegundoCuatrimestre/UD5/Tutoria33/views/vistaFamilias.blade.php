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
                <th>Código QR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($familias as $familia)
                <tr class="text-center">
                    <th>{{ $familia->cod }}</th>
                    <td>{{ $familia->nombre }}</td>
                    <td>{!! $barcodes[$familia->cod] !!}</td>
                    <td><img src="data:image/png;base64,{{ $qrCodes[$familia->cod] }}" alt="Código qr"></td>
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
