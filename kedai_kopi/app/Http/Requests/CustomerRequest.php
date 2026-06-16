<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

            'email' => 'required|email|unique:customers,email,' . $this->route('customer')->id,

            'phone' => 'required|unique:customers,phone,' . $this->route('customer')->id,

            'points' => 'required|numeric|min:0',

            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Harap isi nama pelanggan',
            'name.string' => 'Harap isi nama dengan valid',
            'name.max' => 'Nama terlalu panjang',

            'email.required' => 'Harap isi email pelanggan',
            'email.email' => 'Harap isi dengan email valid',
            'email.unique' => 'Email telah terdaftar dalam sistem',

            'phone.required' => 'Harap isi nomor telepon pelanggan',
            'phone.unique' => 'Nomor telepon tersebut sudah terdaftrar dalam sistem',

            'points.required' => 'Harap isi poin pelanggan',
            'points.number' => 'Harap masukkan poin dalam angka',
            'points.min' => 'Poin pelanggan minimal adalah 0',

            'status.required' => 'Harap isi status pelanggan'
        ];
    }
}
