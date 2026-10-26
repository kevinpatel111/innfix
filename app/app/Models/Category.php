<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'image',
        'status'
    ];

    /** Parent category (for sub / child categories) */
   public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
{
    return $this->hasMany(Product::class, 'category_id');
}
}
