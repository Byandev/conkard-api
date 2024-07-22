<?php

namespace Database\Factories;

use Conkard\Models\Card;
use Conkard\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => $this->faker->word(3),
            'user_id' => fn () => User::factory()->create()->id,
        ];
    }
}
