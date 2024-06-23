<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $productId = $this->route('product');

        return [
            'product_name' => 'required|string|max:255|unique:products,product_name,'. $productId,
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,supplier_id',
            'expiration_date' => 'nullable|date',
        ];

    }

    public function messages()
    {
        return [
            'product_name.required' => 'Product name is required',
            'product_name.unique' => 'Product name already exists',
            'quantity.required' => 'Quantity is required',
            'price.required' => 'Price is required',
            'supplier_id.required' => 'Supplier is required',
            'expiration_date.date' => 'Expiration date must be a valid date',
        ];
    }
}
