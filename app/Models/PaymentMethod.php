<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table='payment_methods';
    protected $primaryKey='payment_method_id';
    protected $fillable=[
    'payment_method'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
