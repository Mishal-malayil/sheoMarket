<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $primaryKey = 'id'; // if you used custom id

    public $timestamps = false; // if table has no timestamps

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
    ];
}
