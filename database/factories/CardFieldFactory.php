<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\CardField;
use App\Models\CardFieldType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CardField>
 */
class CardFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_id' => fn () => Card::factory()->create()->id,
            'label' => $this->faker->word,
            'value' => $this->faker->word,
            'type_id' => fn () => CardFieldType::factory()->create()->id
        ];
    }
}
