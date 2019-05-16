<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    protected $primaryKey = 'id';
}
