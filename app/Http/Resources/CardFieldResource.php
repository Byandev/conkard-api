<?php

namespace App\Http\Resources;

use App\Models\CardField;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CardField
 */
class CardFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'card_id' => $this->card_id,
            'label' => $this->label,
            'value' => $this->value,
            'type_id' => $this->type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
