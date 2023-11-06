<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "pelanggan_21136";
    protected $guarded = [];

    /**
     * Get all of the comments for the Pelanggan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}
