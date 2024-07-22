<?php

namespace Conkard\Http\Requests\Card;

use Conkard\Enums\MediaCollectionType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image',
            'type' => 'required|in:'.MediaCollectionType::CARD_PROFILE_PICTURE->value.','.MediaCollectionType::CARD_COVER_PHOTO->value.','.MediaCollectionType::CARD_COMPANY_LOGO->value,
        ];
    }
}
