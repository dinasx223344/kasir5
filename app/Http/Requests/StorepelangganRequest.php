<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepelangganRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Data Nama Pelanggan belum diisi',
            'email.required' => 'Data Email belum diisi',
            'no_telp.required' => 'Data No Telepon belum diisi',
            'alamat.required' => 'Data Alamat belum diisi'
        ];
    }
}
