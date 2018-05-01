<?php

namespace App\Http\Controllers;

use App\Models\ChanelReviewRequest;
use App\Models\GraphicsRequests;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ChannelController extends Controller
{

    public function getRequestGraphics()
    {

        $canRequest = true;
        $lastRequest = GraphicsRequests::where('user_id', \Auth::user()->id);
        if($lastRequest->count())
        {
            $lastRequest = $lastRequest->orderBy('id', 'DESC')->first();
            if($lastRequest->created_at >= Carbon::now()->subWeek(1))
            {
                $canRequest = false;
            }
        }

        return view('request.graphics', [
            'can_request' => $canRequest
        ]);

    }
    public function postRequestGraphics(Requests\GraphicsFormRequest $request)
    {

        GraphicsRequests::create($request->all());

        return back()->with('success', 'Your request was submitted!');

    }

    public function getReview()
    {
        $canRequest = true;
        $canRequestReason = "";
        $lastReview = ChanelReviewRequest::where('user_id', \Auth::user()->id);

        if($lastReview->count())
        {
            if(\Auth::user()->hasRank('partner'))
            {
                $lastReview = $lastReview->orderBy('id', 'DESC')->first();
                if($lastReview->created_at <= Carbon::now()->subWeek(1))
                {
                    $canRequest = true;
                }
                else
                {
                    $canRequestReason = "There is a channel review cool down of 1 week, please wait!";
                    $canRequest = false;
                }

            }
        }


        return view('review.request', [
            'can_request' => $canRequest,
            'reason' => $canRequestReason
        ]);
    }
    public function postReview()
    {
        if(Input::has('channel_submit'))
        {
            $lastReview = ChanelReviewRequest::where('user_id', \Auth::user()->id);

            if(!$lastReview->count())
            {

                ChanelReviewRequest::create([
                    'channel_id' => \Auth::user()->dailymotion,
                    'user_id' => \Auth::user()->id,
                    'status' => 0,
                    'doc_url' => null
                ]);

                return back()->with('success', 'Your channel has been submitted for a review!');
            } else {
                if(\Auth::user()->hasRank('partner'))
                    return back()->with("You can only request 1 free channel review, please upgrade to elite!");


                return back()->withErrors('Your channel is already awaiting a review!');
            }

        }
    }
}