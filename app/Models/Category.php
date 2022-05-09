<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'store_id',
        'status',
    ];

    public function shop(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
