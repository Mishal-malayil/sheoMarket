<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  

class Size extends Model
{
    protected $primaryKey = 'size_id';
    public $timestamps = true;

    protected $fillable = [
        'shoe_id',
        'size',
        'stock'
    ];

    // Relationship
   public function shoe()
    {
    return $this->belongsTo(Shoe::class, 'shoe_id');
    }
}
