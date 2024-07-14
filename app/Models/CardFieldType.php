<?php

namespace Conkard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardFieldType extends Model
{
    use HasFactory;

    protected $casts = [
        'display_icon' => 'boolean'
    ];
}
