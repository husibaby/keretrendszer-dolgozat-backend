<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWineRequest extends FormRequest
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
            'name'=>'required|string|max:100',
            'vinery'=>'required|string|max:100',
            'grape_variety'=>'required|string|max:100',
            'vintage'=>'required|numeric|integer|min:1800|max:2023',
            'price'=>'required|numeric|integer|min:1|max:9999999|max:100',
        ];
    }
}
