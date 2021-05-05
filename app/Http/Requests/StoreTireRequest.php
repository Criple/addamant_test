<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTireRequest extends FormRequest
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
            'xlsx-file' => 'file',
            'tire_id' => 'numeric',
            'name' => 'required|string',
            'width' => 'required|numeric',
            'profile' => 'numeric|nullable',
            'diameter' => 'required|string',
            'load_index' => 'required|numeric',
            'speed_index' => 'required|string',
            'manufacturer_id' => 'numeric',
            'model_id' => 'numeric',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'parsed_valid' => 'numeric'
        ];
    }
}
