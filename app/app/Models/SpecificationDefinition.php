<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecificationDefinition extends Model
{
    protected $fillable = ['group', 'parameter', 'sort_order'];
}