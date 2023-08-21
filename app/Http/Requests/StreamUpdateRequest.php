<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StreamUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:streams,name,'.$this->stream->id,
            'description' => 'nullable|string',
            'code' => 'required|string|unique:streams,code,'.$this->stream->id,
        ];
    }
}
