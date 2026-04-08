<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'no_telp',
        'password',
        'is_eo',
        'is_renter'
    ];

    protected $hidden = [
        'password',
    ];

    protected $primaryKey = 'id';
}
