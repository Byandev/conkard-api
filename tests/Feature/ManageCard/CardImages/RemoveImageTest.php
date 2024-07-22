<?php

use Conkard\Enums\MediaCollectionType;
use Conkard\Models\Card;
use Conkard\Models\Media;
use Conkard\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);
uses(WithFaker::class);

test('user can remove card image', function (string $type) {

    Sanctum::actingAs($user = User::factory()->create());

    $card = Card::factory()
        ->create(['user_id' => $user->id]);

    $media = Media::factory()->create([
        'model_id' => $card->id,
        'collection_name' => $type,
        'model_type' => get_class($card),
    ]);

    $response = $this->deleteJson(route('cards.images.destroy', [
        'card' => $card,
        'image' => $media,
    ]), [
        'type' => $type,
    ]);

    $response
        ->assertSuccessful()
        ->assertNoContent();
})->with([
    MediaCollectionType::CARD_PROFILE_PICTURE->value,
    MediaCollectionType::CARD_COVER_PHOTO->value,
    MediaCollectionType::CARD_COMPANY_LOGO->value,
]);

test('user cannot remove image of other user card', function () {

    Sanctum::actingAs(User::factory()->create());

    $card = Card::factory()->create();

    $type = fake()->randomElement([
        MediaCollectionType::CARD_PROFILE_PICTURE->value,
        MediaCollectionType::CARD_COVER_PHOTO->value,
        MediaCollectionType::CARD_COMPANY_LOGO->value,
    ]);

    $media = Media::factory()->create([
        'model_id' => $card->id,
        'collection_name' => $type,
        'model_type' => get_class($card),
    ]);

    $response = $this->deleteJson(route('cards.images.destroy', [
        'card' => $card,
        'image' => $media,
    ]), [
        'type' => $type,
    ]);

    $response->assertUnauthorized();
});
