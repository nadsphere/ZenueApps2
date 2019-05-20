<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'kode_id',
        'email',
        'no_telp',
        'status_pembayaran'
    ];

    protected $primaryKey = 'id';
}
