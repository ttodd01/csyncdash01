<?php

namespace App\Http\Controllers\Network;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

/**
 * Class NetworkSettingsController
 * @package App\Http\Controllers\Network
 */
class NetworkSettingsController extends Controller
{


    /**
     * NetworkSettingsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewSettings()
    {
        if(\Auth::user()->rank != 4)
            return view('home');

        $user = User::find(Auth::user()->id);

        return view('network.network-settings', [
            'account' => $user
        ]);
    }

    public function saveSettings(Requests\Network\SaveNetworkSettingsRequest $request)
    {

        $user = Auth::user();
        $network = Auth::user()->getNetwork();

        $network->name = Input::get('name');
        $network->slogan = Input::get('slogan');
        $network->logo_url = Input::get('logo_url');
        $network->network_bio = Input::get('bio');


        $network->twitter = Input::get('twitter');
        $network->facebook = Input::get('facebook');
        $network->youtube = Input::get('youtube');
        $network->instagram = Input::get('instagram');
        $network->linkedin = Input::get('linkedin');

        $network->save();

        return Redirect()->back();



    }
}
