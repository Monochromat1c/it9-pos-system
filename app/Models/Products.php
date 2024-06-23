<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=[
        'product_image',
        'product_name',
        'quantity',
        'price',
        'supplier_id',
        'expiration_date'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }

    public function transactions()
    {
        return $this->belongsToMany(PaymentTransaction::class, 'product_transaction', 'product_id', 'transaction_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

}
