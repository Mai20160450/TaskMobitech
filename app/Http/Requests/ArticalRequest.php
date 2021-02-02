<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticalRequest extends FormRequest
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
            'name.en' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'name.ar' => 'required|regex:/^[\p{Arabic}\s\p{N} ]+$/u',
            'content.en' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'content.ar' => 'required|regex:/^[\p{Arabic}\s\p{N} ]+$/u',
        ];
    }
}
