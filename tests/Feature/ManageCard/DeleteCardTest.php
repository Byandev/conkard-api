<?php

use Conkard\Models\Card;
use Conkard\Models\CardField;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

use function Pest\Faker\fake;

uses(RefreshDatabase::class);

test('user can delete card', function () {

    Sanctum::actingAs($user = User::factory()->create());

    $card = Card::factory()
        ->create(['user_id' => $user->id]);

    CardField::factory()
        ->count(fake()->numberBetween(1, 10))
        ->create(['card_id' => $card->id]);

    $response = $this->deleteJson(route('cards.destroy', [
        'card' => $card,
    ]));

    $response
        ->assertSuccessful()
        ->assertNoContent();

    $this->assertDatabaseMissing('cards', ['id' => $card->id]);
    $this->assertDatabaseMissing('card_fields', ['card_id' => $card->id]);
});

test('user cannot delete card that is belong to other user', function () {

    Sanctum::actingAs(User::factory()->create());
    $card = Card::factory()->create();

    CardField::factory()
        ->count(fake()->numberBetween(1, 10))
        ->create(['card_id' => $card->id]);

    $response = $this->deleteJson(route('cards.destroy', [
        'card' => $card,
    ]));

    $response->assertUnauthorized();
});
