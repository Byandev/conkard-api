<?php

use Conkard\Models\Card;
use Conkard\Models\Contact;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('user can delete contact', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $card = Card::factory()->create();

    $contact = Contact::factory()
        ->create(['user_id' => $user->id, 'card_id' => $card->id]);

    $response = $this->deleteJson(route('contacts.destroy', [
        'contact' => $contact,
    ]));

    $response
        ->assertSuccessful()
        ->assertNoContent();

    $this->assertDatabaseMissing('contacts', [
        'card_id' => $card->id,
        'user_id' => $user->id,
    ]);
});

test('user cannot delete user contact details', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $contact = Contact::factory()->create();

    $response = $this->deleteJson(route('contacts.destroy', [
        'contact' => $contact,
    ]));

    $response->assertUnauthorized();
});

test('guess cannot get contact details', function () {
    $contact = Contact::factory()->create();

    $response = $this->deleteJson(route('contacts.destroy', [
        'contact' => $contact,
    ]));

    $response->assertUnauthorized();
});
