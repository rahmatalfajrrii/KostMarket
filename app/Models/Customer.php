<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'nama_customer',
        'email',
        'no_hp',
        'alamat',
    ];

    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}