<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $table='payment_transactions';
    protected $primaryKey='transaction_id';
    protected $fillable=[
        'user_id',
        'payment_method_id',
        'discount_id',
        'total_amount',
        'amount_paid',
        'change_amount',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }


    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'payment_method_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'discount_id');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'product_transaction', 'transaction_id', 'product_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

}