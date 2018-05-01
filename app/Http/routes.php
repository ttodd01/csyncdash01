<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        if(Auth::guest()) {
            return redirect('/login');
        } else {
            return redirect('/home');
        }

    });
});
Route::get('/via/{ref}', ['as' => 'refer', 'uses' => 'ReferralController@referUser']);

Route::group(['middleware' => ['web', 'DefaultMenu']], function () {
    Route::auth();

    Route::group(['prefix' => 'apps', 'as' => 'apps.'], function() {
        Route::get('/tools', ['as' => 'tools', 'uses' => 'Apps\AppsController@viewTools']);
        Route::get('/sponsorships', ['as' => 'sponsorships', 'uses' => 'Apps\AppsController@viewSponsorships']);

    });
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('/settings', ['as' => 'settings', 'uses' => 'UserController@viewSettings']);
        Route::post('/settings', ['as' => 'settings', 'uses' => 'UserController@saveSettings']);


        Route::get('/contract', ['as' => 'contract', 'uses' => 'UserController@viewContract']);
        Route::any('/payments', ['as' => 'payments', 'uses' => 'UserController@viewPayments']);
        Route::get('/referrals', ['as' => 'referrals', 'uses' => 'UserController@viewContract']);
        Route::get('/channels', ['as' => 'channels', 'uses' => 'UserController@viewChannels']);

    });
    Route::group(['prefix' => 'network', 'as' => 'network.'], function() {
        Route::get('/partners', ['as' => 'partners', 'uses' => 'Network\UserManagementController@viewPartners']);
        Route::get('/networks', ['as' => 'networks', 'uses' => 'Network\UserManagementController@viewNetworks']);
        Route::any('/user/{user_id?}', ['as' => 'user', 'uses' => 'Network\UserManagementController@viewUser']);


        Route::get('/settings', ['as' => 'settings', 'uses' => 'Network\NetworkSettingsController@viewSettings']);
        Route::post('/settings', ['as' => 'settings', 'uses' => 'Network\NetworkSettingsController@saveSettings']);
    });
    Route::group(['prefix' => 'youtube', 'as' => 'youtube.'], function() {
        Route::get('/channels', ['as' => 'channels', 'uses' => 'YouTube\UserManagementController@viewPartners']);
        Route::any('/user/{user_id?}', ['as' => 'user', 'uses' => 'YouTube\UserManagementController@viewUser']);

    });
    Route::group(['prefix' => 'claims', 'as' => 'claims.'], function() {
        Route::get('/claims', ['as' => 'claims', 'uses' => 'Claims\UserManagementController@viewPartners']);
        Route::any('/view/{user_id?}', ['as' => 'view', 'uses' => 'Claims\UserManagementController@viewUser']);

    });
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/manage_sponsorships', ['as' => 'manage-sponsorships', 'uses' => 'Apps\AppsController@viewSponsorshipsAdmin']);
        Route::post('/manage_sponsorships', ['as' => 'manage-sponsorships', 'uses' => 'Apps\AppsController@saveSponsorshipsAdmin']);

    });
    Route::get('/added', ['as' => 'added', 'uses' => 'HomeController@added']);

    Route::get('/home', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    Route::get('/picedit', ['as' => 'picedit', 'uses' => 'HomeController@picEdit']);

    Route::get('/contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    Route::get('/contract', ['as' => 'contract', 'uses' => 'HomeController@contract']);

    /*
  * YouTUbe API STUFFS
  */
    Route::group(['prefix' => 'youtube'], function() {

        Route::get('/auth', function() {
            $authUrl = Youtube::createAuthUrl();
            if(!Auth::user()->has_connected_channel)
            {
                Session::put('connect_channel', 1);
            }
            return Redirect::to($authUrl);
        });

        Route::get('/oauth2-callback', function() {
            if (!isset($_GET['code']))
            {
                return Redirect::to('google.com')->with('message', '$_GET[code] not set');
            }
            $accessToken = Youtube::authenticate(\Illuminate\Support\Facades\Input::get('code'));
            Youtube::saveAccessTokenToDB($accessToken);


            $channelInfo = (object)Youtube::getChannelInformation();

            if(Session::has('reconnect_channel'))
            {
                $user = \App\User::find(Auth::user()->id);
                $channelInfo = (object)Youtube::getChannelInformation();

                Session::remove('reconnect_channel');
                if($user->getChannel()->where('channel_id', $channelInfo->items[0]->id)->count())
                {
                    return Redirect::to('/dashboard');
                } else {
                    return Redirect::to('/failed_to_connect');
                }


            }
            if(Session::has('connect_channel'))
            {

                $user = \App\User::find(Auth::user()->id);
                $user->has_connected_channel = 1;
                $user->save();


                $channelInfo = (object)Youtube::getChannelInformation();

                $channel = new \App\Models\YouTubeChannel();
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

                return Redirect::to('/home');
            }


        });



    });
    Route::get('/networks/partners/users-download',function (){
        $table = \App\User::all();
        $filename = "users.csv";
        $handle = fopen($filename,'w+');
        fputcsv($handle, array('id','full_name','email'));
        foreach ($table as $row) {
            fputcsv($handle, array($row['id'],$row['full_name'] ,$row['email']));
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text.csv',
        );
        return Response::download($filename, 'users.csv', $headers);
    });
    Route::get('/youtube/channels/users-download',function (){
        $table = \App\User::all();
        $filename = "channels.csv";
        $handle = fopen($filename,'w+');
        fputcsv($handle, array('id','full_name','dailymotion', 'rev_share'));
        foreach ($table as $row) {
            fputcsv($handle, array($row['id'],$row['full_name'] ,$row['dailymotion'], $row['rev_share']));
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text.csv',
        );
        return Response::download($filename, 'users.csv', $headers);
    });
    Route::any('/collab', 'CollabController@index');

    Route::any('/trends', 'TrendsController@getTrends');

    Route::post('/get_trends_table/{type}', 'TrendsController@getTrendsTable');

    Route::any('/gear/{category_id?}', 'GearController@getGear');


    Route::group(['prefix' => 'channel'], function() {

        Route::get('/graphics', 'ChannelController@getRequestGraphics');
        Route::post('/graphics', 'ChannelController@postRequestGraphics');
        Route::get('/review', 'ChannelController@getReview');
        Route::post('/review', 'ChannelController@postReview');

    });
    Route::group(['prefix' => 'academy'], function() {

        Route::get('/', 'AcademyController@viewAcademy');
        Route::get('/course/{id?}', 'AcademyController@viewAcademyCourse');
        Route::get('/course/{id?}/lesson/{lesson_id?}', 'AcademyController@viewAcademyCourseLesson');

    });

    Route::group(['prefix' => 'admin-api'], function() {

        Route::post('/delete_user/{user_id}', 'AdminController@postDeleteUser');

        Route::post('/set_status/{id}/{status}', 'AdminController@setGraphicsRequestStatus');

        Route::post('/delete_gear_category/{id}', 'AdminController@deleteGearCategory');

    });

    Route::group(['prefix' => 'admin'], function() {



        Route::get('/create_user', 'AdminController@getCreateUser');
        Route::post('/create_user', 'AdminController@postCreateUser');

        Route::get('/registered_users', 'AdminController@getRegisteredUsers');
        Route::post('/registered_users', 'AdminController@postRegisteredUsers');

        Route::get('/creator_academy', 'AdminController@getCreatorAcademy');
        Route::get('/creator_academy/videos', 'AdminController@getCreatorAcademyVideos');
        Route::post('/creator_academy', 'AdminController@postCreatorAcademy');
        Route::post('/creator_academy/videos', 'AdminController@postCreatorAcademyVideos');

        Route::get('/manage_gear', 'AdminController@getManageGear');
        Route::post('/manage_gear', 'AdminController@postManageGear');


        Route::group(['prefix' => 'requests'], function() {

            Route::get('/graphics', 'AdminController@getGraphicsRequests');
            Route::post('/graphics', 'AdminController@postGraphicsRequests');

            Route::get('/review', 'AdminController@getChannelReview');
            Route::post('/review', 'AdminController@postChannelReview');


        });
    });
    Route::get('{slug}', 'SiteController@showPost');
    Route::get('/earnings/channel', 'EarningsController@channelEarnings');
    Route::post('/earnings/channel', 'EarningsController@addChannelEarnings');
});
