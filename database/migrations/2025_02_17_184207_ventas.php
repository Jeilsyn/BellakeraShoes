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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' como BIGINT UNSIGNED y la define como PRIMARY KEY
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clave foránea que referencia a la tabla 'usuarios'
            $table->timestamp('fecha')->useCurrent(); // Fecha y hora de la venta
            $table->timestamps(); // Registra las fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas'); // Elimina la tabla 'ventas'
    }
};
