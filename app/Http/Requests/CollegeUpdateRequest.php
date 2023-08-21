<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:colleges,name,'.$this->college->id,
            'description' => 'nullable|string',
            'streams' => 'required',
            'code' => 'required|string|unique:colleges,code,'.$this->college->id,
            'principal_name' => 'required',
            'addresss' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|numeric',
            'email' =>'required|email|unique:colleges,email,'.$this->college->id,
            'phone'=>'required|numeric|min_digits:10|max_digits:10|unique:colleges,phone,'.$this->college->id,
            'banner_image'=>'required',
        ];
    }
}
