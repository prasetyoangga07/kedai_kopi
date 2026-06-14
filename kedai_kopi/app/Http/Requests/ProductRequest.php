<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',

            'category' => 'required',

            'variant.*.variant_name' => 'required|string|max:100',

            'variant.*.price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama produk tidak boleh kosong',
            'name.string' => 'Nama produk harus berupa teks valid',
            'name.max' => 'Nama produk terlalu panjang',

            'category.required' => 'Kategori tidak boleh kosong',

            'variant.*.variant_name.required' => 'Ukuran tidak boleh kosong',
            'variant.*.variant_name.string' => 'Ukuran harus berupa teks valid',
            'variant.*.variant_name.max' => 'Ukuran terlalu panjang',

            'variant.*.price.required' => 'Harga produk tidak boleh kosong',
            'variant.*.price.numeric' => 'Harga produk harus berupa angka valid',
            'variant.*.price.min' => 'Harga produk tidak boleh kurang dari nol',
        ];
    }
}
