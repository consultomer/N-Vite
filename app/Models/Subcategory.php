<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = "subcategory";
    protected $primaryKey = "subcategory_id";

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function item()
    {
        return $this->hasMany(Item::class, 'item_id', 'item_id');
    }
}
