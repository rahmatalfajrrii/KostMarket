<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    protected $fillable = [
        'customer_id',
        'kamar_id',
        'tanggal_pemesanan',
        'tanggal_masuk',
        'tanggal_keluar',
        'jumlah_malam',
        'harga_per_malam',
        'total_harga',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_pemesanan' => 'date',
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
        'harga_per_malam' => 'decimal:2',
        'total_harga' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}
