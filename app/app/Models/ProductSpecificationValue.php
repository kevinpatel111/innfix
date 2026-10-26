<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecificationValue extends Model
{
    protected $fillable = [
        'product_id',
        'specification_definition_id',
        'value'
    ];

    public function definition()
    {
        return $this->belongsTo(SpecificationDefinition::class, 'specification_definition_id');
    }
}

