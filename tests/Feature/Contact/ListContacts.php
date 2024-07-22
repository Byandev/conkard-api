<?php

use Conkard\Models\Contact;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

use function Pest\Faker\fake;

uses(RefreshDatabase::class);

test('user can list contacts', function () {
    $user = User::factory()->create();

    Contact::factory()
        ->count($count = fake()->numberBetween(1, 10))
        ->create(['user_id' => $user->id]);

    Sanctum::actingAs($user);

    $response = $this->getJson(route('contacts.index'));

    $response->assertSuccessful()
        ->assertJsonCount($count, 'data')
        ->assertJsonStructure([
            'data' => [
                [
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
                        'fields',
                    ],
                ],
            ],
        ]);
});
