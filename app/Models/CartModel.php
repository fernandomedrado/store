<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartModel extends AbstractModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

    protected $fillable = [
        'cart_id',
        'cart_uuid',
        'product_id',
    ];
}
