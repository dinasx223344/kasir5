<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorekategoriRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_kategori' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Data Nama Kategori belum diisi',
        ];
    }
}
