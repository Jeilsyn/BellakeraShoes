<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->integer('id')->primary(); // Crea la columna 'id' como INT y la define como PRIMARY KEY
            $table->string('model', 255); // Crea la columna 'modelo' como VARCHAR(255)
            $table->string('brand', 255); // Crea la columna 'marca' como VARCHAR(255)
            $table->integer('stock'); // Crea la columna 'stock' como INT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product'); // Elimina la tabla 'productos' si existe
    }
};
