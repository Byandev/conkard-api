<?php

use App\Models\Card;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use function Pest\Faker\fake;

uses(RefreshDatabase::class);

test('user can list cards', function () {
    $user = User::factory()->create();

    Card::factory()
        ->count($count = fake()->numberBetween(1, 10))
        ->create(['user_id' => $user->id]);

    Sanctum::actingAs($user);

    $response = $this->getJson(route('cards.index'));

    $response->assertSuccessful()
        ->assertJsonCount($count, 'data')
        ->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'user_id',
                    'label',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            ]
        ]);
});
