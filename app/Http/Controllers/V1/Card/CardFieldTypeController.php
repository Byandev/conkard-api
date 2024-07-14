<?php

namespace Conkard\Http\Controllers\V1\Card;

use Conkard\Http\Controllers\Controller;
use Conkard\Http\Resources\CardFieldTypeResource;
use Conkard\Models\CardFieldType;

class CardFieldTypeController extends Controller
{
    public function __invoke()
    {
        $data = CardFieldType::all();

        return CardFieldTypeResource::collection($data);
    }
}
