<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('id')->primary(); // Crea la columna 'id' como INT y la define como PRIMARY KEY
            $table->string('modelo', 255); // Crea la columna 'modelo' como VARCHAR(255)
            $table->string('marca', 255); // Crea la columna 'marca' como VARCHAR(255)
            $table->integer('año'); // Crea la columna 'año' como INT
            $table->integer('stock'); // Crea la columna 'stock' como INT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos'); // Elimina la tabla 'productos' si existe
    }
};
