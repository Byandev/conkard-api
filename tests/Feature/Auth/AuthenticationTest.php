<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->postJson(route('login'), [
        'email' => $user->email,
        'password' => 'password',
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
                    'updated_at'
                ]
            ]
        ]);
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $response = $this->postJson(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['email']);
});

test('users can logout', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $response = $this->postJson(route('logout'));

    $response->assertSuccessful();
});
