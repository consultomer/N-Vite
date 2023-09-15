<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }
    public function item()
    {
        return $this->hasMany(Item::class, 'item_id', 'item_id');
    }
}
