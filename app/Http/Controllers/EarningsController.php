<?php

namespace App\Http\Controllers;
use App\ChannelEarnings;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

class EarningsController extends Controller
{
    public function channelEarnings()
    {
        if(\Auth::user()->rank != 4)
            return view('home');
        return view('/earnings/channel', [
            'channels' => ChannelEarnings::orderBy('id', 'ASC')->paginate(100),
            'this_month_total' => ChannelEarnings::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count(),
        ]);
    }

    public function addChannelEarnings(Request $r)
    {

        $addChannelEarnings = new ChannelEarnings();
        $addChannelEarnings->user_id = $r->user_id;
        $addChannelEarnings->earning_month = $r->earning_month;
        $addChannelEarnings->payment_month = $r->payment_month;
        $addChannelEarnings->gross_amount = $r->gross_amount;
        $addChannelEarnings->net_amount = $r->net_amount;

        $addChannelEarnings->status = $r->status;

        $addChannelEarnings->save();

        return redirect()->back();

    }

}
