<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TiketDetail extends Model
{
    use HasFactory;

    protected $table = "tiket_detail_21136";
    protected $guarded = [];

    /**
     * Get the tiket that owns the TiketDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiket(): BelongsTo
    {
        return $this->belongsTo(Tiket::class, 'tiket_21136_id', 'id');
    }

    /**
     * Get the wisata that owns the TiketDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wisata(): BelongsTo
    {
        return $this->belongsTo(Wisata::class);
    }
}
