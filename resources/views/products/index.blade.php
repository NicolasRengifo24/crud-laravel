@extends('layouts.app')
@section('title','Lista De Productos')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h4">Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo</a>   
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $products as $product )
        <tr>
            <td>{{ $product -> id }}</td>
            <td>{{ $product -> nombre }}</td>
            <td>{{ $product -> descripcion }}</td>
            <td>{{ number_format($product -> precio,2) }}</td>
            <td>{{ $product -> stock }}</td>
            <td class="text-end">
                <a href="{{ route('products.show',$product) }}"class="btn btn-info">Ver El Detalle</a>
                <a href="{{ route('products.edit',$product) }}"class="btn btn-warning">Editar</a>
                <form action="{{ route('products.destroy',$product) }}" method="post" class="d-inline">
                    @csrf @method('DELETE') 
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminar Producto?')">Eliminar</button>
                </form> 
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
@endsection
