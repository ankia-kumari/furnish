<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAppConfigurationRequest extends FormRequest
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
          $id = $this->route('id');
        return [
            'title' => 'required|string',
            'slug' => 'required|string|unique:app_configurations,slug,'.$id,
            'value' => 'required'
        ];
    }
}
