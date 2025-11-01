<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'status' => 'required|in:0,1',
                'city_id' => 'required|integer',
                'phone' => 'nullable|string|max:255',
            ];
        }else{
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $this->id,
                'password' => 'nullable|string|min:8',
                'status' => 'required|in:0,1',
                'city_id' => 'required|integer',
                'phone' => 'nullable|string|max:255',
            ];
        }

    }
}
