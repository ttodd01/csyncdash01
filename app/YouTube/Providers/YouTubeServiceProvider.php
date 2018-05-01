<?php

namespace App\YouTube\Providers;

use App\YouTube\YouTube;
use Illuminate\Support\ServiceProvider;


class YouTubeServiceProvider extends ServiceProvider
{


    protected $defer = false;

    public function boot()
    {

        \App::bind('youtube', function()
        {
            return new YouTube(new \Google_Client);
        });
    }

    public function register()
    {


    }

    public function provides()
    {
        return array();
    }
}
