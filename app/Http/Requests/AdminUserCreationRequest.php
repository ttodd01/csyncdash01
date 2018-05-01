<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserCreationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if(\Auth::user()->is_admin != 1)
            return false;

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
            'email' => 'required',
            'password' => 'required'
        ];
    }
}
