<?php

namespace Database\Factories;

use Conkard\Enums\CardFieldCategory;
use Conkard\Models\CardFieldType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CardFieldType>
 */
class CardFieldTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'suggested_labels' => $this->faker->word,
            'display_icon' => $this->faker->boolean,
            'category' => $this->faker->randomElement(CardFieldCategory::cases()),
            'icon_url' => $this->faker->imageUrl(100, 100),
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
