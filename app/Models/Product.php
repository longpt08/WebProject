<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'detail',
        'status',
        'average_rating',
        'gender',
    ];

    public function categoryProducts()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
