<?php

use Conkard\Models\Card;
use Conkard\Models\CardField;
use Conkard\Models\Contact;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

use function Pest\Faker\fake;

uses(RefreshDatabase::class);

test('user can get contact details', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $card = Card::factory()->create();

    CardField::factory()
        ->count(fake()->numberBetween(1, 10))
        ->create(['card_id' => $card->id]);

    $contact = Contact::factory()
        ->create(['user_id' => $user->id, 'card_id' => $card->id]);

    $response = $this->getJson(route('contacts.show', [
        'contact' => $contact,
    ]));

    $response->dump()->assertSuccessful()
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
                    'fields' => [
                        [
                            'id',
                            'card_id',
                            'label',
                            'value',
                            'type_id',
                            'created_at',
                            'updated_at',
                            'type' => [
                                'id',
                                'name',
                                'suggested_labels',
                                'display_icon',
                                'category',
                                'icon_url',
                                'order',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
});

test('user cannot get other user contact details', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $contact = Contact::factory()->create();

    $response = $this->getJson(route('contacts.show', [
        'contact' => $contact,
    ]));

    $response->assertUnauthorized();
});

test('guess cannot get contact details', function () {
    $contact = Contact::factory()->create();

    $response = $this->getJson(route('contacts.show', [
        'contact' => $contact,
    ]));

    $response->assertUnauthorized();
});
