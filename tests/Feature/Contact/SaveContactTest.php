<?php

use Conkard\Models\Card;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('user can save new contact', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $card = Card::factory()->create();

    $response = $this->postJson(route('contacts.store'), [
        'card_id' => $card->id,
    ]);

    $response->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                'id',
                'card_id',
                'created_at',
                'updated_at',
                'card' => [
                    'id',
                    'user_id',
                    'label',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ],
        ]);

    $this->assertDatabaseHas('contacts', [
        'card_id' => $card->id,
        'user_id' => $user->id,
    ]);
});

test('user cannot save own card', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $card = Card::factory()->create(['user_id' => $user->id]);

    $response = $this->postJson(route('contacts.store'), [
        'card_id' => $card->id,
    ]);

    $response->assertForbidden();
});

test('guess cannot save new contact', function () {
    $response = $this->postJson(route('contacts.store'));

    $response->assertUnauthorized();
});
