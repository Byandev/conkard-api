<?php

use Conkard\Enums\MediaCollectionType;
use Conkard\Models\Card;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);
uses(WithFaker::class);

test('user can upload card image', function (string $type) {

    Sanctum::actingAs($user = User::factory()->create());

    $card = Card::factory()
        ->create(['user_id' => $user->id]);

    $response = $this->post(route('cards.images.store', [
        'card' => $card,
    ]), [
        'type' => $type,
        'image' => UploadedFile::fake()->image("$type.png"),
    ]);

    $response
        ->assertSuccessful()
        ->assertJsonFragment(['collection_name' => $type])
        ->assertJsonStructure([
            'data' => [
                'id',
                'uuid',
                'name',
                'size',
                'type',
                'file_name',
                'mime_type',
                'extension',
                'preview_url',
                'original_url',
                'order_column',
                'manipulations',
                'collection_name',
                'custom_properties',
                'responsive_images',
                'human_readable_size',
                'generated_conversions',
                'created_at',
                'updated_at',
            ],
        ]);
})->with([
    MediaCollectionType::CARD_PROFILE_PICTURE->value,
    MediaCollectionType::CARD_COVER_PHOTO->value,
    MediaCollectionType::CARD_COMPANY_LOGO->value,
]);

test('user cannot upload image to other user card', function () {

    Sanctum::actingAs(User::factory()->create());

    $card = Card::factory()->create();

    $type = fake()->randomElement([
        MediaCollectionType::CARD_PROFILE_PICTURE->value,
        MediaCollectionType::CARD_COVER_PHOTO->value,
        MediaCollectionType::CARD_COMPANY_LOGO->value,
    ]);

    $response = $this->post(route('cards.images.store', [
        'card' => $card,
    ]), [
        'type' => $type,
        'image' => UploadedFile::fake()->image("$type.png"),
    ]);

    $response->assertUnauthorized();
});
