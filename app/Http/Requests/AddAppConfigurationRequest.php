<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AddAppConfigurationRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
               // new Uppercase()
            ],
            'slug' => 'required|string|unique:app_configurations,slug',
            'value' => 'required'
        ];
    }

    // public function messages()
    // {
    //    return [
    //      // 'required' => "This :attribute is my custom message",
    //        'slug.unique' => "dasdds"
    //    ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'title' => 'name'
    //     ];
    // }

    // public function validationData()
    // {
    //     $this->request->add(['value'=>'fasf']);
    //     return $this->all();
    // }
}
