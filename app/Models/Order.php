<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'email',
        'price',
        'status',
    ];

    public function order()
    {
        return $this->hasMany(OrderdItem::class);
    }
}
