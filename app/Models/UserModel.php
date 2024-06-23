<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='users';
    protected $primaryKey='user_id';
    protected $fillable=[
        'profile_picture',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'birthday',
        'gender_id',
        'address',
        'contact_number',
        'email',
        'username',
        'password',
        'role_id',
    ];

    public function gender()
    {
        return $this->belongsTo(GenderModel::class, 'gender_id', 'gender_id');
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'role_id');
    }
}
