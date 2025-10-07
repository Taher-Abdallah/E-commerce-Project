<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
        return [
            'code' => ['required','string','max:255',Rule::unique('coupons', 'code')->ignore($this->coupon)],
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'limit' => 'required|integer|min:1',
            'time_used' => 'nullable|integer|min:0',
            'end_date' => 'required|date|after:today',
            'start_date' => 'required|date|before:end_date|after_or_equal:today',
            'is_active' => 'required|boolean|in:0,1',
        ];
    }
}
