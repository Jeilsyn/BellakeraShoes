<?php

namespace Database\Seeders;

use App\Models\User;
//Creación de los Models en app/Models 
/**
 * Aquí se insertan objetos de las tablas, para uso de ejemplos o bien para pruebas como el de usuario,  lo que pasa es que hay que crear antes las clases en modelos dentro de la ruta 
 * 
 * app/Models 
 */

use App\Models\Productos;
use App\Models\Ventas;
use App\Models\VentaProducto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Productos::factory(10)->create();

        // Crear ventas (por ejemplo, 5 ventas)
        $ventas = Venta::factory(5)->create();

        // Relacionar productos a las ventas (suponiendo que la relación es muchos a muchos)
        foreach ($ventas as $venta) {
            // Crear un número aleatorio de productos vendidos para cada venta
            $productos = Producto::inRandomOrder()->take(rand(1, 3))->get();

            // Relacionar los productos con la venta (esto creará registros en la tabla pivot)
            foreach ($productos as $producto) {
                // Creando la relación entre la venta y el producto en la tabla pivot 'venta_producto'
                VentaProducto::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $producto->id,
                    'cantidad' => rand(1, 5), // Puedes ajustar la cantidad de productos vendidos
                ]);
            }
        }
    }
}
