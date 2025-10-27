<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'small_desc' => 'required|string|max:500',
            'desc' => 'required|string',
            'status' => 'required|boolean',
            'sku' => 'required|string|max:100',
            'available_for' => 'nullable|date',
            'available_in_stock' => 'required|integer',
            'has_variants' => 'required|boolean',

            'price' => $this->has_variants == 1
                ? 'nullable|numeric|min:0'
                : 'required|numeric|min:0',

            'discount' => 'nullable|numeric',
            'start_discount' => 'nullable|date|before_or_equal:end_discount',
            'end_discount' => 'nullable|date|after_or_equal:start_discount',
            
            'manage_stock' => 'required|boolean',
            'quantity' => $this->manage_stock == 1 ? 'required|integer|min:0' : 'nullable|integer',
            'available_in_stock' => 'required|integer',
            'views' => 'nullable|integer',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'images' => 'nullable|array',

            'variants' => 'required_if:has_variants,1|array',
            'variants.*.price' => 'required|numeric|min:0',
            // 'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.stock' => 'required|integer|min:0',

            'variants.*.color' => 'required|exists:attribute_values,id',
            'variants.*.size' => 'required|exists:attribute_values,id',
            'deleted_images' => 'nullable|string'

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Product Name',
            'small_desc' => 'Small Description',
            'desc' => 'Description',
            'status' => 'Status',
            'sku' => 'SKU',
            'available_for' => 'Available For',
            'available_in_stock' => 'Available In Stock',
            'has_variants' => 'Has Variants',
            'price' => 'Price',
            'discount' => 'Discount',
            'start_discount' => 'Start Discount',
            'end_discount' => 'End Discount',
            'manage_stock' => 'Manage Stock',
            'quantity' => 'Quantity',
            'views' => 'Views',
            'brand_id' => 'Brand',
            'category_id' => 'Category',
            'images.*' => 'Product Images',
            'images' => 'Product Images',
            'variants.*.price' => 'variant price',
            'variants.*.quantity' => 'variant quantity',
            'variants.*.color' => 'variant color',
            'variants.*.size' => 'variant size',
            'name' => 'product name',
            'has_variants' => 'has variants',
            'price' => 'product price',
        ];
    }
}
