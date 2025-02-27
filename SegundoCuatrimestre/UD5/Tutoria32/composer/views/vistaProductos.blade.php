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
                <th>Código de barras</th> <!-- Columna para mostrar el código de barras -->
                <th>Código qr</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $item)
                <tr class="text-center">
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->nombre_corto }}</td>
                    <td class="{{ $item->pvp > 100 ? 'text-danger' : 'text-success' }}">{{ $item->pvp }}</td>
                    <!-- Mostrar el código de barras como imagen -->
                    <td>
                        <img src="data:image/png;base64,{{ $item->codigo_barras }}" alt="Código de barras">
                    </td>
                    <td>
                        <img src="data:image/png;base64,{{ $item->qrCode }}" alt="Código de barras">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Enlace para navegar a la vistaFamilias -->
    <div class="text-center">
        <a href="familias.php" class="btn btn-primary">Ver Familias</a> <!-- Cambia la URL a la correcta si es necesario -->
    </div>
@endsection
