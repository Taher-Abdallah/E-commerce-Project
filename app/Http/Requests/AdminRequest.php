<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255',Rule::unique(Admin::class)->ignore($this->id)],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
            'status'=> ['required','in:0,1'],
            'role_id'=> ['required'],
        ];

        if(in_array($this->method(), ['PUT', 'PATCH'])) {
            $data['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
        }else{
            $data['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        return $data;
    }
}
