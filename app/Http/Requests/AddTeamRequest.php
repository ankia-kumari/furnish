<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTeamRequest extends FormRequest
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
           'name' => 'required|string',
           'designation' => 'required|string',
           'image'=>'required|mimes:jpeg,bmp,png,jpg',
           'facebook_url' => 'required|string',
           'twitter_url' => 'required|string',
           'linkedin_url' => 'required|string',
           'feed_url' => 'required|string',
           'status' => 'required|integer|max:1'
        ];
    }
}
