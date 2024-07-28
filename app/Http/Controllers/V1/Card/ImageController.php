<?php

namespace Conkard\Http\Controllers\V1\Card;

use Conkard\Http\Controllers\Controller;
use Conkard\Http\Requests\Card\RemoveImageRequest;
use Conkard\Http\Requests\Card\UploadImageRequest;
use Conkard\Http\Resources\MediaResource;
use Conkard\Models\Card;
use Conkard\Models\Media;
use Exception;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function store(UploadImageRequest $request, Card $card)
    {
        if (auth()->id() !== $card->user_id) {
            return response(['message' => 'Unauthorized'], 401);
        }

        Log::error(json_encode(config('filesystems.disks.s3')));

        try {
            $card
                ->addMedia($request->file('image'))
                ->toMediaCollection($request->input('type'));

        } catch (Exception $e) {
            return response([
                'message' => 'Failed to upload file',
                'error' => $e->getMessage(),
            ], 500);
        }

        return MediaResource::make($card->getImageByType($request->input('type')));
    }

    public function destroy(RemoveImageRequest $request, Card $card, $image_id)
    {
        if (auth()->id() !== $card->user_id) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $image = Media::where('id', $image_id)
            ->where('model_id', $card->id)
            ->where('model_type', get_class($card))
            ->where('collection_name', $request->input('type'))
            ->firstOrFail();

        $image->delete();

        return response()->noContent();
    }
}
