<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $data = [
            'name' => ['required', 'string', 'max:255', 'unique:brands,name,' . $this->id],
            'status' => ['required', 'boolean', 'in:0,1'],
        ];

        if ($this->isMethod('post')) {
            $data['logo'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $data['logo'] = ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }
        return $data;
    }
}
