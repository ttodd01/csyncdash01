<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class ReferralController extends Controller
{
    public function referUser(Request $request, $ref)
    {
        $user = User::where('username', $ref);
        if($user->count())
        {
            $user = $user->first();
            {
                \Session::put('referred_by', $user->id);
                return Redirect::to('/register');
            }
        }
    }
}
