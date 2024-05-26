<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'product_desc',
        'product_image',
    ];

    public function getFormattedPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(['.', ','], ['', '.'], $value);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
