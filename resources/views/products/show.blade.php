@extends('layouts.app')

@section('title', 'Detalle Producto')

@section('content')
    <h1 class="h4 mb-3">Detalle del producto</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->nombre }}</h5>
            <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <p><strong>Descripción:</strong> {{ $product->descripcion }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
