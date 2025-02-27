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
            @foreach ($familias as $item)
                <tr class="text-center">
                    <th>{{ $item->cod }}</th>
                    <td>{{ $item->nombre }}</td>
                    <td><img src="data:image/png;base64,{{ $item->codigo_barras }}" alt="Código de barras"></td>
                    <td><img src="data:image/png;base64,{{ $item->qrCode }}" alt="Códio QR"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Enlace para navegar a la vistaFamilias -->
    <div class="text-center">
        <a href="productos.php" class="btn btn-primary">Ver Productos</a> <!-- Cambia la URL a la correcta si es necesario -->
    </div>
@endsection
