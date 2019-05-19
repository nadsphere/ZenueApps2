<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eo extends Model
{
    protected $table = 'eos';

    protected $fillable = [
        'id',
        'user_id',
        'nama_eo',
        'email',
        'alamat',
        'kontak',
        'link',
        'gambar_profil',
    ];

    protected $primaryKey = 'id';
}
