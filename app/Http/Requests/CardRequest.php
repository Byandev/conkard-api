<?php

namespace Conkard\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'label' => 'required|string',
            'fields' => 'required|array|min:1',
            'fields.*.type_id' => 'required|exists:card_field_types,id',
            'fields.*.value' => 'required|string',
            'fields.*.label' => 'sometimes|string|nullable',
        ];
    }
}
