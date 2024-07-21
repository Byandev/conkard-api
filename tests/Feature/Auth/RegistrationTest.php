<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Faker\fake;

uses(RefreshDatabase::class);

test('new users can register', function () {
    $response = $this->postJson(route('register'), [
        'name' => fake()->name,
        'email' => fake()->email,
        'password' => $password = fake()->password,
        'password_confirmation' => $password,
    ]);

    $response->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                'access_token',
                'token_type',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
});
