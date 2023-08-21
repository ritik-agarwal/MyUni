<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntranceExamCreateRequest extends FormRequest
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
            'admission_year' =>'required',
            'name' => 'required|string|max:255|unique:entrance_exams,name,',
            'description' => 'nullable|string',
            'code' => 'required|string|unique:entrance_exams,code,',
            'courses' => 'required',
            'exam_date' => 'nullable|after_or_equal:reg_last_date',
            'reg_start_date' =>'required|after_or_equal:today',
            'reg_last_date' => 'required|after_or_equal:reg_start_date',
            'fee'=>'required|numeric',
            'result_date'=>'nullable|after_or_equal:exam_date'
        ];
    }
    public function attributes(): array
    {
        return [
            'reg_start_date' => 'Registration Start Date',
            'reg_last_date' => 'Registration Last Date',
            'result_date' => 'Result Date',
            'admission_year' => 'Admission Year',
            'exam_date' => 'Exam Date'
        ];
    }
}
