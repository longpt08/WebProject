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
        'quantity',
        'image_url',
    ];

    public function categoryProducts()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getImageUrl()
    {
        return $this->image_url;
    }
}
