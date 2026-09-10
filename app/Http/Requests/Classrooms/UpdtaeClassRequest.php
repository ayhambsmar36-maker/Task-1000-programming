<?php

namespace App\Http\Requests\Classrooms;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdtaeClassRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|unique:classrooms,name|string|max:255',
            'description' => 'nullable|string|max:1000',
            'capacity' => 'nullable|integer|min:1|max:100',
           

        ];
    }
    public function messages(): array
    {
        return [
            'name.string' => 'اسم الصف يجب أن يكون نصاً.',
            'name.max' => 'اسم الصف يجب ألا يتجاوز 255 حرفاً.',
            'name.unique' => 'اسم الصف موجود مسبقاً.',

            'description.string' => 'الوصف يجب أن يكون نصاً.',
            'description.max' => 'الوصف يجب ألا يتجاوز 1000 حرفاً.',

            'capacity.integer' => 'السعة يجب أن تكون رقماً صحيحاً.',
            'capacity.min' => 'السعة يجب ألا تقل عن 1.',
            'capacity.max' => 'السعة يجب ألا تتجاوز 100.',

            
        ];
    }
}
