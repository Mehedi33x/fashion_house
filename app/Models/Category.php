<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function catProducts()
    {
        return $this->belongsTo(Product::class, 'category_id', 'id');
    }
    // public function subCategory()
    // {
    //     return $this->hasMany(SubCategory::class, 'category_id', 'id');
    // }
}
