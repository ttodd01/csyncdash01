<?php

namespace App\Http\Controllers\Network;

use App\Models\Network\Network;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserManagementController extends Controller
{
    public function viewPartners()
    {
        if(\Auth::user()->rank != 4)
            return view('home');



        return view('network.list-partners', [
            'pending_partners' => User::where('head_network', Auth::user()->getNetwork()->id)
                ->orWhere(['rank' => 4])
                ->paginate(10)
        ]);
    }

    public function viewNetworks()
    {

        return view('network.list-networks', [
            'networks' => Network::where('head_network', Auth::user()->getNetwork()->id)->paginate(10)
        ]);
    }

    public function viewUser($user_id = null)
    {
        if(\Auth::user()->rank != 4)
            return view('home');

        if($user_id == null)
            $user_id = Auth::user()->id;

        $user = User::find($user_id);


        if(Input::has('accept_user'))
        {
            $user = User::find(Input::get('accept_user'));
            $user->rank = 2;
            $user->save();
            return Redirect()->back();
        }

        return view('network.view-user', [
            'user' => $user
        ]);

    }
}
