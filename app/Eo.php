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
        'no_telp',
        'kontak',
        'link',
        'link_website',
        'deskripsi',
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

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'eo_id');
    }

    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }
}
