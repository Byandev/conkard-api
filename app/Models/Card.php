<?php

namespace Conkard\Models;

use Conkard\Enums\MediaCollectionType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Card extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUuids;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $casts = [
        'id' => 'string'
    ];

    public function fields(): HasMany
    {
        return $this->hasMany(CardField::class );
    }

    public function profilePicture(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', MediaCollectionType::CARD_PROFILE_PICTURE->value);
    }

    public function companyLogo(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', MediaCollectionType::CARD_COMPANY_LOGO->value);
    }

    public function coverPhoto(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', MediaCollectionType::CARD_COVER_PHOTO->value);
    }
}
