<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Notifiable, Sortable;

    protected $fillable = [

        'category_id',
        'name',
        'slug',
        'image',
        'gallery',
        'youtube_link',
        'product_descripion',
        'short_description',
        'status',
    ];

    protected $casts = [

        'gallery' => 'array',
        'status' => 'boolean',

    ];

    protected $appends = [

        'image_full_path',
        'image_thumb_full_path'

    ];

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getImageFullPathAttribute()
    {
        return asset(
            'website/adminproduct/multiimg/' .
            $this->id .
            '/image/' .
            $this->image
        );
    }

    public function getImageThumbFullPathAttribute()
    {
        return asset(
            'website/adminproduct/multiimg/' .
            $this->id .
            '/image/128px/' .
            $this->image
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function specificationValues()
    {
        return $this->hasMany(ProductSpecificationValue::class);
    }
}