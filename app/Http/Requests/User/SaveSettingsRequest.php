<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class SaveSettingsRequest extends Request
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
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'paypal_email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'bio' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'birth_day' => 'required',
            'birth_month' => 'required',
            'birth_year' => 'required'
        ];
    }
}
