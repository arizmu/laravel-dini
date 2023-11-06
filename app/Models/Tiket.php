<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tiket extends Model
{
    use HasFactory;
    protected $table = "tiket_21136";
    protected $guarded = [];

    /**
     * Get all of the detail for the Tiket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail(): HasMany
    {
        return $this->hasMany(TiketDetail::class, 'tiket_21136', 'id');
    }
}
