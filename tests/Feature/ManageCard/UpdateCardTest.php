<?php

use Conkard\Models\Card;
use Conkard\Models\CardField;
use Conkard\Models\CardFieldType;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

use function Pest\Faker\fake;

uses(RefreshDatabase::class);

test('user can update card', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $card = Card::factory()
        ->create(['user_id' => $user->id]);

    CardField::factory()
        ->count(fake()->numberBetween(1, 10))
        ->create(['card_id' => $card->id]);

    $response = $this->putJson(route('cards.update', ['card' => $card]), [
        'label' => fake()->word,
        'fields' => [
            [
                'type_id' => CardFieldType::factory()->create()->id,
                'value' => fake()->words(3, true),
                'label' => fake()->words(3, true),
            ],
            [
                'type_id' => CardFieldType::factory()->create()->id,
                'value' => fake()->words(3, true),
                'label' => fake()->words(3, true),
            ],
            [
                'type_id' => CardFieldType::factory()->create()->id,
                'value' => fake()->words(3, true),
                'label' => fake()->words(3, true),
            ],
            [
                'type_id' => CardFieldType::factory()->create()->id,
                'value' => fake()->words(3, true),
                'label' => fake()->words(3, true),
            ],
        ],
    ]);

    $response->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                'id',
                'user_id',
                'label',
                'fields' => [
                    [
                        'id',
                        'card_id',
                        'label',
                        'value',
                        'type_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ],
        ]);
});

test('guess cannot save new card', function () {
    $response = $this->postJson(route('cards.store'));

    $response->assertUnauthorized();
});

test('user cannot update other user card', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $card = Card::factory()->create();

    CardField::factory()
        ->count(fake()->numberBetween(1, 10))
        ->create(['card_id' => $card->id]);

    $response = $this->putJson(route('cards.update', ['card' => $card]), [
        'label' => fake()->word,
        'fields' => [
            [
                'type_id' => CardFieldType::factory()->create()->id,
                'value' => fake()->words(3, true),
                'label' => fake()->words(3, true),
            ],
        ],
    ]);

    $response->assertUnauthorized();
});
