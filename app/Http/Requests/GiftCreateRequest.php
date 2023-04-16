<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftCreateRequest extends FormRequest
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
            'name'  => 'string|min:2|max:60|required',
            'title' => 'string|min:5|max:100|required',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'desc'  => 'nullable',
            "coin"  => 'required',
        ];
    }
}
