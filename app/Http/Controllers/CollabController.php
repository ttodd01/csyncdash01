<?php

namespace App\Http\Controllers;

use App\Models\Collaboration;
use App\Models\CollaborationRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CollabController extends Controller
{

    public function index()
    {

        if(Input::has('request_collab'))
        {

            CollaborationRequest::create([
                'user_id' => Input::get('request_collab'),
                'requesting_user_id' => \Auth::user()->id
            ]);
            
            $requested_user = User::find(Input::get('request_collab'));

            return \Redirect::back()->with('success', 'You have requested to collaborate with '. $requested_user->name);

        }
        if(Input::has('add_profile_for_collab'))
        {

            Collaboration::create([
                'user_id' => \Auth::user()->id,
                'status' => 0,
                'message' => Input::get('message')
            ]);

            return \Redirect::back()->with('success', 'Your profile has been added to the collaboration hub!');

        }

        if(Input::has('remove_profile'))
        {

            $collab = Collaboration::where('user_id', \Auth::user()->id)->first();
            Collaboration::destroy($collab->id);

            return \Redirect::back()->with('success', 'Your profile has been removed from the collaboration hub!');

        }

        $collabs = Collaboration::paginate(10);


        $myCollabs = CollaborationRequest::where('user_id', \Auth::user()->id)->get();


        return view('collabs.all', [
            'collabs' => $collabs,
            'mycollabs' => $myCollabs
        ]);
    }

}
