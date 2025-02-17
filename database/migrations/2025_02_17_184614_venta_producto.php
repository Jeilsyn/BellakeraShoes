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
        Schema::create('venta_producto', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' como PRIMARY KEY
            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade'); // Clave foránea que referencia la tabla 'ventas'
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Clave foránea que referencia la tabla 'productos'
            $table->integer('cantidad'); // Cantidad del producto vendido en esa venta
            $table->decimal('precio', 8, 2); // Precio del producto en esa venta
            $table->timestamps(); // Registra las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_producto'); // Elimina la tabla 'venta_producto'
    }
};
