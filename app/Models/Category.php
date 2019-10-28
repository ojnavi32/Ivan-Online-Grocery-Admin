<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id', 
        'name', 
        'slug'
    ];

    public function getFillables()
    {
        return $this->fillable;
    }

    /** ---------- RELATIONSHIP FUNCTIONS ---------- **/   
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
