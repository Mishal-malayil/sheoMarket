<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Size;

class Shoe extends Model
{
    protected $primaryKey = 'shoe_id';
    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'price',
        'description',
        'image'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'shoe_id');
    }
    public function sizes()
    {
    return $this->hasMany(Size::class,'shoe_id');
    }
}