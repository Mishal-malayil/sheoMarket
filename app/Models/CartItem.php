<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $primaryKey = 'cart_item_id';
    public $timestamps = false;

    protected $fillable = [
        'cart_id',
        'shoe_id',
        'size',
        'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }
}
