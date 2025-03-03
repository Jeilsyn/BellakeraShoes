<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\Product;
use App\Models\BillProduct;

class BillProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las facturas y productos
        $bills = Bill::all();
        $products = Product::all();

        // Verificar que haya facturas y productos en la base de datos
        if ($bills->isEmpty() || $products->isEmpty()) {
            return;
        }

        // Asociar productos a facturas de manera aleatoria
        foreach ($bills as $bill) {
            $randomProducts = $products->random(rand(1, 5)); // Selecciona entre 1 y 5 productos aleatorios

            foreach ($randomProducts as $product) {
                BillProduct::create([
                    'bill_id' => $bill->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 10), // Cantidad aleatoria entre 1 y 10
                    'price' => $product->price ?? rand(10, 500), // Precio aleatorio si no tiene precio
                ]);
            }
        }
    }
}
