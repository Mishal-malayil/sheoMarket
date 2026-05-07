<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $primaryKey = 'order_item_id';
    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'shoe_id',
        'size',
        'price',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }
}
