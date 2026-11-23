<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    protected $fillable = [
        'pemesanan_id',
        'tanggal_pembayaran',
        'jumlah_pembayaran',
        'metode_pembayaran',
        'status_pembayaran',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'date',
        'jumlah_pembayaran' => 'decimal:2',
    ];

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
