<?php

use Conkard\Models\Card;
use Conkard\Models\CardField;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);
uses(\Illuminate\Foundation\Testing\WithFaker::class);

test('user can get card details', function () {

    Sanctum::actingAs($user = User::factory()->create());

    $card = Card::factory()
        ->create(['user_id' => $user->id]);

    CardField::factory()
        ->count($this->faker->numberBetween(1, 10))
        ->create(['card_id' => $card->id]);

    $response = $this->getJson(route('cards.show', [
        'card' => $card
    ]));

    $response->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                    'id',
                    'user_id',
                    'label',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
        ]);
});
