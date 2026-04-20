<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'id_paket',
        'kode_booking',
        'email',
        'no_telp',
        'tanggal_acara',
        'status_pembayaran',
    ];

    protected $casts = [
        'status_pembayaran' => 'integer',
        'tanggal_acara' => 'date',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status_pembayaran) {
            0 => 'Pending',
            1 => 'Paid',
            2 => 'Confirmed',
            3 => 'Cancelled',
            default => 'Unknown',
        };
    }
}
