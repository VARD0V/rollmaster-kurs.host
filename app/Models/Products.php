<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'amount', 'gram', 'image', 'category_id'];

    protected $table = 'Products';

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function cart()
    {
        return $this->hasMany(Carts::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'compound');
    }
}
