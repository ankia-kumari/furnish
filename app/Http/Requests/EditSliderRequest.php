<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSliderRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|mimes:jpeg,bmp,png,jpg',
            'status' => 'required|integer|max:1',
            'link' => 'required|string'
        ];
    }
}
