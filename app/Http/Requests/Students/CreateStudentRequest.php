<?php

namespace App\Http\Requests\Students;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date|before:today|date_format:Y-m-d',
            'classroom_id' => 'required|exists:classrooms,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'اسم الطالب مطلوب.',
            'name.string' => 'اسم الطالب يجب أن يكون نصاً.',
            'name.max' => 'اسم الطالب يجب ألا يتجاوز 255 حرفاً.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني غير صالح.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',

            'phone.string' => 'رقم الهاتف يجب أن يكون نصاً.',
            'phone.max' => 'رقم الهاتف يجب ألا يتجاوز 20 حرفاً.',

            'birth_date.date' => 'تاريخ الميلاد يجب أن يكون تاريخاً صحيحاً.',

            'classroom_id.required' => 'معرف الصف مطلوب.',
            'classroom_id.exists' => 'معرف الصف غير صحيح.',
        ];
    }
}
