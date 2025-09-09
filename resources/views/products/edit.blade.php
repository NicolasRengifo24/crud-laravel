@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')

    <h1 class="h4 mb-3">Editar producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input name="nombre" value="{{ old('nombre', $product->nombre) }}" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Precio</label>
            <input name="precio" type="number" step="0.01" value="{{ old('precio', $product->precio) }}" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Stock</label>
            <input name="stock" type="number" value="{{ old('stock', $product->stock) }}" class="form-control" required>
        </div>

        <div class="col-12">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $product->descripcion) }}</textarea>
        </div>

        <div class="col-12">
            <button class="btn btn-primary">Actualizar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection

