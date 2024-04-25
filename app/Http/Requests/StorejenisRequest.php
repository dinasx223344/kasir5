<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorejenisRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_jenis' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_jenis.required' => 'Data Nama Jenis belum diisi',
        ];
    }
}
