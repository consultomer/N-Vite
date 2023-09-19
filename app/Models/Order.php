<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $primaryKey = "id";
    public function email()
    {
        return $this->hasMany(Email::class, 'order_id', 'id');
    }
}
