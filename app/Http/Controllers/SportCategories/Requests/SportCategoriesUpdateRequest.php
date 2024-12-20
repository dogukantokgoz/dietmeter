<?php

namespace App\Http\Controllers\SportCategories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SportCategoriesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'move_id' => 'nullable',
            'category_name' => 'nullable'
        ];
    }
}
