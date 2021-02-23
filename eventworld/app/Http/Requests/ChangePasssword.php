<?php

namespace App\Http\Requests;

use App\Rules\CheckPasswordIsSame;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasssword extends FormRequest
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
            'oldpassword' => ['required', new CheckPasswordIsSame],
            'newpassword1' => 'required|string|min:8',
            'newpassword2' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'oldpassword.required' => 'Old Password is not the same',
            'newpassword1.required' => 'New Password is required',
            'newpassword1.min' => 'New Password must have at least 8 characters',
            'newpassword2.required' => 'New Password',
            'newpassword2.min' => 'New Password must have at least 8 characters'

        ];
    }
}
