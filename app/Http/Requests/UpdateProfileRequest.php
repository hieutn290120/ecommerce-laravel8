<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required',
            'email'=> 'required|email',
            'password' => 'max:50',
            'phone' => 'max:12',
            'address'=>'max:255',
            'country'=>'max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
