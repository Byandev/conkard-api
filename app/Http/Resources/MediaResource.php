<?php

namespace Conkard\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin Media
 */
class MediaResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => $this->name,
            'size' => $this->size,
            'type' => $this->type,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'extension' => $this->extension,
            'preview_url' => $this->preview_url,
            'original_url' => $this->original_url,
            'order_column' => $this->order_column,
            'manipulations' => $this->manipulations,
            'collection_name' => $this->collection_name,
            'custom_properties' => $this->custom_properties,
            'responsive_images' => $this->responsive_images,
            'human_readable_size' => $this->human_readable_size,
            'generated_conversions' => $this->generated_conversions,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
