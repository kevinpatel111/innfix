<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [

        'title',
        'image',
        'status'

    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}