<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table='carts';
    protected $primaryKey='cart_id';
    protected $fillable=[
    'product_id',
    'quantity',
    'price'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
