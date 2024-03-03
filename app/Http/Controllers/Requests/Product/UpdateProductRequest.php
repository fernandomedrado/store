<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Models\ProductModel;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'ID do produto é obrigatório',
            'product_name.required' => 'Nome do produto é obrigatório',
            'product_description.required' => 'Descrição do produto é obrigatório',
            'product_price.required' => 'Preço do produto é obrigatório',
        ];
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|integer',
            'product_name' => 'required|max:255',
            'product_description' => 'required|max:255',
            'product_price' => 'required|floot',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
