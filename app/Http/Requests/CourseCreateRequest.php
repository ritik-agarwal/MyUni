<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseCreateRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:courses,name,',
            'description' => 'nullable|string',
            'stream_id' => 'required|exists:streams,id',
            'category_id' => 'required|exists:course_categories,id',
            'code' => 'required|string|unique:courses,code,',
        ];
    }
}
