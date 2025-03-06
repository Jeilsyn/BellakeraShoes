<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'productos'; // 👈 Especificar el nombre correcto de la tabla

    public $timestamps = false; // Desactivamos timestamps porque no están en la tabla

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modelo',
        'marca',
        'año',
        'stock',
    ];
}
