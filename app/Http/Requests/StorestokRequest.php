<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorestokRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'menu_id' => 'required',
            'jumlah' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'menu_id.required' => 'Data Nomor Meja belum diisi',
            'jumlah.required' => 'Data Jumlah belum diisi',
        ];
    }
}
