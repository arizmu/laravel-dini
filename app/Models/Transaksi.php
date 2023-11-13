<?php

namespace App\Models;

use Encore\Admin\Form\Field\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as RelationsHasMany;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi_21136";
    protected $guarded = [];

    /**
     * Get all of the detail for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail(): RelationsHasMany
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_21136', 'id');
    }
}
