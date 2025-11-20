<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderShippingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'note' => 'nullable',
            'country_id' => 'required|exists:countries,id',
            'governorate_id' => 'required|exists:governorates,id',
            'city_id' => 'required|exists:cities,id',
            'street' => 'nullable',
        ];
    }
}
