<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bill_product', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' como PRIMARY KEY
            $table->foreignId('bill_id')->constrained('bill')->onDelete('cascade'); // Clave foránea que referencia la tabla 'ventas'
            $table->foreignId('product_id')->constrained('product')->onDelete('cascade'); // Clave foránea que referencia la tabla 'productos'
            $table->integer('quantity'); // Cantidad del producto vendido en esa venta
            $table->decimal('price', 8, 2); // Precio del producto en esa venta
            $table->timestamps(); // Registra las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_product'); // Elimina la tabla 'venta_producto'
    }
};
