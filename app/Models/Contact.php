<?php

namespace Conkard\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
