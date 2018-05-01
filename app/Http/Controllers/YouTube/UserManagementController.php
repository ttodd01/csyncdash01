<?php

namespace App\Http\Controllers\YouTube;

use App\Models\YouTubeChannel;
use App\User;
use Carbon\Carbon;
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


        return view('youtube.list-partners', [
            'pending_partners' => User::orderBy('id', 'ASC')->paginate(100),

        ]);
    }



    public function viewUser($user_id = null)
    {
        if($user_id == null)
            $user_id = Auth::users()->id;

        $user = User::find($user_id);


        if(Input::has('accept_user'))
        {
            $user = User::find(Input::get('accept_user'));
            $user->has_connected_channel = 1;
            $user->save();
            return Redirect()->back();
        }
        if(Input::has('decline_user'))
        {
            $user = User::find(Input::get('decline_user'));
            $user->has_connected_channel = 0;
            $user->save();
            return Redirect()->back();
        }
        return view('youtube.view-user', [
            'user' => $user
        ]);

    }
    public function declineUser($user_id = null)
    {
        if($user_id == null)
            $user_id = Auth::youtube_channels()->id;

        $user = User::find($user_id);


        if(Input::has('decline_user'))
        {
            $user = User::find(Input::get('decline_user'));
            $user->has_connected_channel = 1;
            $user->save();
            return Redirect()->back();
        }

        return view('youtube.view-user', [
            'user' => $user
        ]);

    }
}
