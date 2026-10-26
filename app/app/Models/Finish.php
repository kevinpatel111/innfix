<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;

class Finish extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_name');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'category_size');
    }
}
