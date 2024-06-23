<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table='discounts';
    protected $primaryKey='discount_id';
    protected $fillable=[
    'discount_name',
    'discount_amount'
    ];
}
