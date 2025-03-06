<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Obtener todos los productos (GET)
    public function index()
    {
        $productos = Product::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar un producto concreto (GET)
    public function show(Product $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Crear un nuevo producto (POST)
    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'año' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    // Modificar un producto (PUT)
    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'modelo' => 'sometimes|string|max:255',
            'marca' => 'sometimes|string|max:255',
            'año' => 'sometimes|integer',
            'stock' => 'sometimes|integer|min:0',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    // Actualizar solo el stock de un producto (PUT)
    public function updateStock(Request $request, Producto $producto)
    {
        $request->validate(['stock' => 'required|integer|min:0']);

        $producto->update(['stock' => $request->stock]);

        return redirect()->route('productos.index')->with('success', 'Stock actualizado.');
    }

    // Eliminar un producto (DELETE)
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
