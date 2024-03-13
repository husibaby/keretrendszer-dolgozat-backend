<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWineRequest extends FormRequest
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
            'name'=>'string|max:100',
            'vinery'=>'string|max:100',
            'grape_variety'=>'string|max:100',
            'vintage'=>'numeric|integer|min:1800|max:2023',
            'price'=>'numeric|integer|min:1|max:9999999',
        ];
    }
}
