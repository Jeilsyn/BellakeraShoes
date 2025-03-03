<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\User;
use App\Models\Product;
use App\Models\BillProduct;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Si no hay usuarios, crear algunos
        if ($users->isEmpty()) {
            $users = User::factory(5)->create();
        }

        // Obtener todos los productos
        $products = Product::all();

        // Si no hay productos, crear algunos
        if ($products->isEmpty()) {
            $products = Product::factory(10)->create();
        }

        // Crear 10 facturas aleatorias
        Bill::factory(10)->create()->each(function ($bill) use ($products) {
            // Obtener entre 1 y 5 productos aleatorios para esta factura
            $selectedProducts = $products->random(rand(1, 5));

            foreach ($selectedProducts as $product) {
                BillProduct::create([
                    'bill_id' => $bill->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 5), // Cantidad aleatoria
                    'price' => $product->price, // Precio del producto
                ]);
            }
        });
    }
}
