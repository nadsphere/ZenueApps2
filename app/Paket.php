<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'pakets';

    protected $fillable = [
        'id_eo',
        'gambar_paket',
        'nama_paket',
        'kategori',
        'available',
        'deskripsi',
        'harga_paket',
    ];

    protected $primaryKey = 'id';
}
