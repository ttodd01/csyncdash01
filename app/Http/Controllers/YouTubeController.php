<?php

namespace App\Http\Controllers;



class YouTubeController extends Controller
{
    public function auth() {
        $authUrl = \App\YouTube\Facades\Youtube::createAuthUrl();
        if(!Auth::user()->has_connected_channel)
        {
            Session::put('connect_channel', 1);
        }
        return Redirect::to($authUrl);
    }

    public function yt()
    {
        if (!isset($_GET['code']))
        {
            return Redirect::to('google.com')->with('message', '$_GET[code] not set');
        }
        $accessToken = \App\YouTube\Facades\Youtube::authenticate(Input::get('code'));
       \App\YouTube\Facades\Youtube::saveAccessTokenToDB($accessToken);


        $channelInfo = (object)\App\YouTube\Facades\Youtube::getChannelInformation();

        if(Session::has('reconnect_channel'))
        {
            $user = User::find(Auth::user()->id);
            $channelInfo = (object)Youtube::getChannelInformation();

            Session::remove('reconnect_channel');
            if($user->getChannel()->where('channel_id', $channelInfo->items[0]->id)->count())
            {
                return Redirect::to('/added');
            } else {
                return Redirect::to('/failed_to_connect');
            }


        }
        if(Session::has('connect_channel'))
        {

            $user = \App\User::find(Auth::user()->id);
            $user->has_connected_channel = 1;
            $user->save();


            $channelInfo = (object)\App\YouTube\Facades\Youtube::getChannelInformation();

            $channel = new YouTubeChannel();
            $channel->user_id = $user->id;
            $channel->channel_id = $channelInfo->items[0]->id;

            $channelInfo = $channelInfo->items[0];

            $channel->username = $channelInfo->snippet->title;
            $channel->description = $channelInfo->snippet->description;
            $channel->thumbnail = $channelInfo->snippet->thumbnails->high->url;
            $channel->banner = $channelInfo->brandingSettings->image->bannerImageUrl;
            $channel->views = $channelInfo->statistics->viewCount;
            $channel->subscribers = $channelInfo->statistics->subscriberCount;
            $channel->videos = $channelInfo->statistics->videoCount;
            $channel->push();

            return Redirect::to('/added');
        }
    }
}
