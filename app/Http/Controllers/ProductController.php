<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Listar todos los productos (GET)
    public function index()
    {
        $productos = Product::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario de creación (GET)
    public function create()
    {
        return view('productos.create');
    }

    // Guardar un nuevo producto (POST)
    public function store(Request $request)
    {
        // Asegurar que los campos requeridos no estén vacíos
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'año' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);
    
        // Crear el producto con los datos validados
        Product::create([
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'año' => $request->año,
            'stock' => $request->stock,
        ]);
    
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }    
    // Mostrar formulario de edición (GET)
    public function edit(Product $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto (PUT/PATCH)
    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'año' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    // Eliminar un producto (DELETE)
    public function destroy(Product $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
