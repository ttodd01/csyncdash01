<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function viewSettings()
    {

        return view('user.settings');
    }

    public function saveSettings(Requests\User\SaveSettingsRequest $request)
    {
        $user = User::find(Auth::user()->id)->update(Input::all());

        return \Redirect::back();
    }

    public function viewContract()
    {
        return view('user.mycontract');
    }
    public function viewReferrals()
    {
        return view('user.referrals');
    }
    public function viewPayments()
    {
        return view('/user/payments');
    }
    public function viewChannels()
    {
        return view('user.channels');
    }
}
