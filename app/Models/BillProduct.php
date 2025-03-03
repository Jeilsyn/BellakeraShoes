<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BillProduct extends Pivot
{
    use HasFactory;

    /**
     * Especifica el nombre de la tabla.
     *
     * @var string
     */
    protected $table = 'bill_product';

    /**
     * Los atributos que pueden asignarse masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bill_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Relación con el modelo Bill (cada registro pertenece a una venta).
     */
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    /**
     * Relación con el modelo Product (cada registro pertenece a un producto).
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
