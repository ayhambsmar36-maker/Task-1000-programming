<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:teachers,email,',
            'phone_number' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:500',
            'classroom_id' => 'nullable|exists:classrooms,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.string' => 'اسم المعلم يجب أن يكون نصاً.',
            'name.max' => 'اسم المعلم يجب ألا يتجاوز 255 حرفاً.',

            'email.email' => 'البريد الإلكتروني غير صالح.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',

            'phone_number.string' => 'رقم الهاتف يجب أن يكون نصاً.',
            'phone_number.max' => 'رقم الهاتف يجب ألا يتجاوز 20 حرفاً.',

            'specialization.string' => 'التخصص يجب أن يكون نصاً.',
            'specialization.max' => 'التخصص يجب ألا يتجاوز 500 حرفاً.',

            'classroom_id.exists' => 'معرف الصف غير صحيح.',
        ];
    }
}
