<?php

namespace App\Http\Requests\Network;

use App\Http\Requests\Request;
use App\Models\Network\Network;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SaveNetworkSettingsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->hasNetwork())
            return true;

        if(Network::where('name', Input::get('name'))->count())
            return false;

        return false;
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
            'slogan' => 'required',
            'background-image' => 'required',
        ];
    }
}
