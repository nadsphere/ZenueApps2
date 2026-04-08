<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eo extends Model
{
    use HasFactory;

    protected $table = 'eos';

    protected $fillable = [
        'user_id',
        'nama_eo',
        'email',
        'alamat',
        'kontak',
        'link',
        'gambar_profil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pakets()
    {
        return $this->hasMany(Paket::class, 'id_eo');
    }
}
