<?php

namespace Conkard\Http\Resources;

use Conkard\Models\CardFieldType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CardFieldType
 */
class CardFieldTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "suggested_labels" => $this->suggested_labels,
            "display_icon" => $this->display_icon,
            "category" => $this->category,
            "icon_url" => $this->icon_url
        ];
    }
}
