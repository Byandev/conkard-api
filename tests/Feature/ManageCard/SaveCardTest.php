<?php

use Conkard\Models\CardFieldType;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use function Pest\Faker\fake;

uses(RefreshDatabase::class);


test('user can list save new card', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->postJson(route('cards.store'), [
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
            ]
        ]
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
                        'updated_at'
                    ]
                ]
            ]
        ]);
});

test('guess cannot save new card', function () {
    $response = $this->postJson(route('cards.store'));

    $response->assertUnauthorized();
});
