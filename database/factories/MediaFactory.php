<?php

namespace Database\Factories;

use Conkard\Models\Media;
use Conkard\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $name = $this->faker->word,
            'mime_type' => $this->faker->mimeType(),
            'size' => $this->faker->numberBetween(1, 100),
            'file_name' => fn () => $name.'.'.$this->faker->fileExtension(),
            'collection_name' => $this->faker->word,
            'model_type' => User::class,
            'disk' => 'public',
            'model_id' => fn () => User::factory()->create()->id,
            'manipulations' => [],
            'custom_properties' => [],
            'generated_conversions' => [],
            'responsive_images' => [],
        ];
    }
}
