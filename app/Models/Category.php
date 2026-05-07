<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ protected $table = 'category';

    protected $primaryKey = 'category_id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    // Relationship
    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'category_id');
    }
}
