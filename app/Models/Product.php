<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getPriceAttribute($value)
    {
        $value = (float) $value;
        $isInteger = $value == floor($value);
        return $isInteger ? (int) $value : $value;
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
