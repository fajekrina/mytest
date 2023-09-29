<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SewaRequest extends FormRequest
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
            'id_titip' => 'required',
            'tgl_sewa' => 'required',
            'tgl_akhir' => 'required',
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
            'id_titip.required' => 'A kendaraan is required',
            'tgl_sewa.required' => 'A tanggal sewa is required',
            'tgl_akhir.required' => 'A tanggal akhir is required',
        ];
    }
}
