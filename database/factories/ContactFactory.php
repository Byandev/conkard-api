<?php

namespace Database\Factories;

use Conkard\Models\Card;
use Conkard\Models\Contact;
use Conkard\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'card_id' => fn () => Card::factory()->create()->id,
            'user_id' => fn () => User::factory()->create()->id,
        ];
    }
}
