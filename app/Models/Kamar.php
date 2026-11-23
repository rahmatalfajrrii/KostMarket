<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kamar extends Model
{
    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'status',
        'deskripsi',
    ];

    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}