<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Views\Views;
use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // controlador que me muestra Lista de productos
        $products = product::all();
        // debe existir la vista 
        return view('products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  formulario donde estan los datos a registrar
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // metodo para gestionar el clic al boton guardar 
        $validate = $request -> validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'precio' => 'required|numeric|min:0',
        'stock' =>  'required|integer|min:0'
        ]);
         product::create($validate);
        // crea el objeto validate , aqui no es necesario hacer INSERT INTO
    
        return redirect() ->route('products.index') -> with('succes','Producto registrado exitosamente');


    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        // Mostrar los detalles de un prodcuto
        return view('products.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        // controlador que maneja el clic Editar en la tabla 

        return view('products.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        // controlador que actualiza en el formulario el cambio

         $validate = $request -> validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'precio' => 'required|numeric|min:0',
        'stock' =>  'required|integer|min:0'
        ]);
         product::update($validate);
        // crea el objeto validate , aqui no es necesario hacer INSERT INTO
    
        return redirect() ->route('products.index') -> with('succes','Producto actualizado exitosamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        // Eliminar producto 
        product :: delete();
         return redirect() ->route('products.index') -> with('succes','Producto Eliminado exitosamente');

    }
}
