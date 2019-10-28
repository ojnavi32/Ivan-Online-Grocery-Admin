<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'stock',
        'image',
        'active'
    ];

    public function getFillables()
    {
        return $this->fillable;
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
