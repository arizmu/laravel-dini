<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Wisata extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'wisata_21136';
    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    /**
     * Get all of the tiket_detail for the Wisata
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiket_detail(): HasMany
    {
        return $this->hasMany(TiketDetail::class);
    }
}
