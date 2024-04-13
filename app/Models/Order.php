<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'dateOrder', 'payment_id', 'user_id', 'status_id'];
    protected $table = 'Order';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'compound');
    }
    public function Orderlist()
    {
        return $this->hasMany(Orderlist::class);
    }
}
