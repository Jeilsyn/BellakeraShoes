<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller {
    public function index() {
        $bills = Bill::with('user', 'products')->get();
        return view('bills.index', compact('bills'));
    }

    public function create() {
        $productos = Product::all();
        return view('bills.create', compact('productos'));
    }

    public function store(Request $request) {
        $request->validate([
            'productoss' => 'required|array',
            'productos.*' => 'exists:productos,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        // Crear la factura
        $bill = Bill::create([
            'user_id' => Auth::id(),
            'date' => now(),
        ]);

        // Agregar productos a la factura
        foreach ($request->products as $index => $productId) {
            $product = Product::findOrFail($productId);
            $quantity = $request->quantities[$index];
            $price = $product->precio;

            $bill->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }

        return redirect()->route('bills.index')->with('success', 'Venta registrada correctamente.');
    }
}
