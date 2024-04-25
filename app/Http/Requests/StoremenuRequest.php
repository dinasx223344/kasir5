<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoremenuRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_menu' => 'required',
            'jenis_id' => 'required',
            'harga' => 'required',
            'image' => 'required',
            'deskripsi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_menu.required' => 'Data Nama Menu  belum diisi',
            'jenis_id.required' => 'Data Jenis belum diisi',
            'harga.required' => 'Data Harga belum diisi',
            'image.required' => 'Data Image belum diisi',
            'deskripsi.required' => 'Data Deskripsi belum diisi',
        ];
    }
}
