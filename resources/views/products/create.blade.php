@extends('layouts.app');
@section('title','Nuevo Producto')

@section('content')
 <h1 class = "h4 mb-3">Nuevo Producto</h1>

 @if ($errors -> any())
 <div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors -> all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
 </div>
 @endif

<form action="{{ route('products.store')}}" method="POST" class="row g-3">
    @csrf
        <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input name="nombre" value="{{ old('nombre') }}" class="form-control" required>
        </div>
        <div class="col-12">
            <label class="form-label" >Descripcion</label>
            <textarea name="descripcion" class="form-control">{{old('descripcion')}}</textarea>
        </div>
        <div class="col-md-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio" value="{{old('precio')}}" class="form-control" required>
        </div>
        <div class="col-md-3">
             <label class="form-label">Stock</label>
            <input type="number" name="stock" value="{{old('stock',0)}}" class="form-control" required>
        </div>
         <button class="btn btn-success">Guardar</button>
         <a href="{{route('products.index')}}" class="btn btn-secondary">Cancelar</a>

</form>
@endsection
