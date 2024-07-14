<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardFieldTypeResource;
use App\Models\CardFieldType;

class CardFieldTypeController extends Controller
{
    public function __invoke()
    {
        $data = CardFieldType::all();

        return CardFieldTypeResource::collection($data);
    }
}
