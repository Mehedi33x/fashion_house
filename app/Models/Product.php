<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $slugAttributes = ['name']; //for slug generate

    //relation
    public function catData()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Boot the model.
     */
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
