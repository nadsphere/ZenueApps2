<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'pemesan_id',
        'renter_id',
        'jenis_layanan',
        'lokasi',
        'konsep_acara',
        'deskripsi_acara',
        'jumlah_tamu',
        'tanggal_acara',
        'informasi',
        'is_accepted',
    ];

    protected $casts = [
        'jumlah_tamu' => 'integer',
        'is_accepted' => 'integer',
        'tanggal_acara' => 'datetime',
    ];

    public function pemesan()
    {
        return $this->belongsTo(User::class, 'pemesan_id');
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }
}
