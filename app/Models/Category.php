<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $slugAttributes = ['name']; //for slug generate

    public function catProducts()
    {
        return $this->belongsTo(Product::class, 'category_id', 'id');
    }
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'sub_categories', 'id');
    }

    /* boot function */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->generateUniqueSlug();
        });
        static::updating(function ($model) {
            $model->generateUniqueSlug();
        });
    }

    /**
     * Generate a unique slug for the model.
     */
    protected function generateUniqueSlug()
    {
        foreach ($this->slugAttributes as $attribute) {
            $slug = Str::slug($this->$attribute);
            $uniqueSlug = $slug;
            $count = 1;
            while (static::where('slug', $uniqueSlug)->where('id', '!=', $this->id)->exists()) {
                $uniqueSlug = $slug . '-' . $count++;
            }
            $this->slug = $uniqueSlug;
        }
    }
}
