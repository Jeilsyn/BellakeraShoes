<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Bill;
use App\Models\BillProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Product::factory(10)->create();

        // Crear ventas (bills)
        $bills = Bill::factory(5)->create();

        // Relacionar productos a las ventas
        foreach ($bills as $bill) {
            $products = Product::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($products as $product) {
                BillProduct::create([
                    'bill_id' => $bill->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 5),
                ]);
            }
        }
    }
}

