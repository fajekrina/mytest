<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'merk' => 'required',
            'jenis' => 'required',
            'nama' => 'required',
            'nopol' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'merk.required' => 'A merk is required',
            'jenis.required' => 'A jenis is required',
            'nama.required' => 'A nama is required',
            'nopol.required' => 'A nomor polisi is required',
        ];
    }
}
