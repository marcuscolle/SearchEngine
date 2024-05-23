<?php

namespace App\Http\Requests\Front;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->method() === 'POST' || $this->method() === 'GET';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'location' => 'required|string',
            'availability' => 'required|date',
            'min_sleeps' => 'required|integer|min:1',
            'min_beds' => 'required|integer|min:1',
            'accepts_pets' => 'sometimes|nullable|boolean',
            'near_beach' => 'sometimes|nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'location.required' => 'Location field is required.',
            'availability.required' => 'Availability date field is required.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'min_sleeps' => $this->input('min_sleeps', 1),
            'min_beds' => $this->input('min_beds', 1),
            'accepts_pets' => $this->boolean('accepts_pets'),
            'near_beach' => $this->boolean('near_beach'),
        ]);
    }
}
