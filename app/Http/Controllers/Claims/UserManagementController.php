<?php

namespace App\Http\Controllers\Claims;

use App\ContentId;
use App\Models\YouTubeChannel;
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



        return view('claims.list-partners', [
            'channels' => ContentId::orderBy('id', 'ASC')->paginate(100),
            'this_week_total' => YouTubeChannel::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->count(),

            'this_month_total' => YouTubeChannel::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count(),
            'pending_partners' => YouTubeChannel::orderBy('id', 'ASC')->paginate(100),

        ]);
    }



    public function viewUser($user_id = null)
    {
        if($user_id == null)
            $user_id = Auth::content_id()->id;

        $user = ContentId::find($user_id);


        return view('claims.view-user', [
            'user' => $user
        ]);

    }

}
