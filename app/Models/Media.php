<?php

namespace Conkard\Models;

use Database\Factories\MediaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    use HasFactory;

    protected static function newFactory(): MediaFactory
    {
        return MediaFactory::new();
    }
}
