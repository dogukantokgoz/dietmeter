<?php

namespace App\Http\Controllers\Program\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramUpdateRequest extends FormRequest
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
            'data' => 'required|array',
            'data.*.id' => 'required',
            'data.*.category' => 'required',
            'data.*.move' => 'required',
            'data.*.move_amount' => 'required|integer',
            'data.*.set_amount' => 'required|integer'
        ];
    }
}
