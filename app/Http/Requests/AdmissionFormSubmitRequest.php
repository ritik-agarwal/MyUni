<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionFormSubmitRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' =>'required|string|max:255',
            'last_name'=>'nullable|string|max:255',
            'email'=>'required|email|unique:admissions,email',
            'course_id' => 'required|exists:courses,id',
            'college_id' => 'nullable|exists:colleges,id',
            'exam_id' => 'nullable|exists:entrance_exams,id'
        ];
    }
}
