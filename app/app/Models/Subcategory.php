<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Category;

class Subcategory extends Model
{
    use Notifiable, Sortable;

    protected $fillable = [
        'category_name',   'title',
        'short_description',
        'image',
        'status'
    ];

    public $sortable = ['id','category_name', 'title'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_name');
    }
}
