<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Downloadinquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'number',
        'inquiry_type',
        'message',
    ];
}
