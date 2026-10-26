<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Category;
use App\Models\Subcategory;

class Catalogue extends Model
{
    use Notifiable, Sortable;

    protected $fillable = [
        'title',
        'image',
        'status',
    ];

  
}
