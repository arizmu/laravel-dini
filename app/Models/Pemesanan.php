<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemesanan extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the Pemesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wisata(): BelongsTo
    {
        return $this->belongsTo(Wisata::class);
    }

    /**
     * Get the user that owns the Pemesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    /**
     * Get the pembayaran associated with the Pemesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class);
    }
}
