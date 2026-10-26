<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breadcrumbimage extends Model
{
    
    public $sortable = ['id', 'image'];

    protected $fillable = [
        'breadcrumb_name','image'
      ]; 

    public function breadcrumbpage()
    {
        return $this->belongsTo('App\Breadcrumbpage', 'breadcrumb_name');
    }
}
