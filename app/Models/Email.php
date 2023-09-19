<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = "email";
    protected $fillable = [
        'name',
        'order_id',
        'email',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
