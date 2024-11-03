<?php

namespace App\Http\Controllers\UserProfile\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileStoreRequest extends FormRequest
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
            'weight' => 'nullable',
            'height' => 'nullable',
            'age' => 'nullable',
            'gender' => 'nullable',
            'activity_level' => 'nullable',
            'diet_type' => 'nullable',
            'diet_type2' => 'nullable'	
        ];
    }
}
