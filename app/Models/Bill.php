<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    /**
     * Especifica el nombre de la tabla si no sigue la convención de Laravel.
     *
     * @var string
     */
    protected $table = 'bill';

    /**
     * Los atributos que pueden asignarse masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'date',
    ];

    /**
     * Define la relación con el modelo User (un bill pertenece a un usuario).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación con los productos (muchos a muchos a través de la tabla pivot).
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'bill_product')
                    ->withPivot('quantity') // Incluye la cantidad de productos vendidos
                    ->withTimestamps();
    }
}
