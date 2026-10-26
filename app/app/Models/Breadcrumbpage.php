<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breadcrumbpage extends Model
{
    public $sortable = ['id', 'image'];

    protected $fillable = [
        'image'
      ];

    public function Breadcrumbimage()
    {
        return $this->hasMany('App\Breadcrumbimage');
    }
}
