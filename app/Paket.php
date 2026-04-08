<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

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

    public function eo()
    {
        return $this->belongsTo(Eo::class, 'id_eo');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_paket');
    }

    public function getImagesAttribute()
    {
        return json_decode($this->gambar_paket, true) ?? [];
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->harga_paket, 0, ',', '.');
    }
}
