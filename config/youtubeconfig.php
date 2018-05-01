<?php

return array(

    /**
     * Application name
     */
    'application_name' => config('app.name'),
    /**
     * Client ID
     */
    'client_id' => env('YOUTUBE_CLIENT_ID'),

    /**
     * Client Secret
     */
    'client_secret' => env('YOUTUBE_CLIENT_SECRET'),

    /**
     * Redirect URI. This should be just the path part of the URI, excluding the http://mydomain.com/ part
     */
    'redirect_uri' => 'youtube/oauth2-callback',

    /**
     * Scopes
     */
    'scopes' => [
        "https://www.googleapis.com/auth/youtube",
        "https://www.googleapis.com/auth/yt-analytics.readonly",
        "https://www.googleapis.com/auth/yt-analytics-monetary.readonly",
        "https://www.googleapis.com/auth/youtubepartner",
        "https://www.googleapis.com/auth/youtubepartner-channel-audit"
    ],

    /**
     * Access type
     */
    'access_type' => 'offline',

    /**
     * Approval prompt
     */
    'approval_prompt' => 'auto',

    /**
     * Table name for Accestokens
     */
    'table_name' => 'youtube_access_token',

    /**
     * Save and access the authentication tokens based on the Authenticated user.
     * Preferable when your system makes use of multiple users with Laravels authentication
     */
    'auth' => true,

);

