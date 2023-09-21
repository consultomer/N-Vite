<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $primaryKey = "id";

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'user_id');
    }
}
