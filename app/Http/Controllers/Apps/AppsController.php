<?php

namespace App\Http\Controllers\Apps;

use App\Models\Apps\App;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AppsController extends Controller
{




    public function viewSponsorshipsAdmin()
    {
        if(\Auth::user()->rank != 4)
            return view('home');

        return view('admin.apps.manage-sponsorships');


    }

    public function saveSponsorshipsAdmin()
    {

        if(Input::has('edit_app'))
        {
            $app = App::find(Input::get('edit_app'));
            return Redirect()->back()->with('editing', $app);

        }
        if(Input::has('editing') && Input::get('editing') == 0)
        {

            $app = new App();
            $app->create(Input::except('editing'));
            return Redirect()->back();

        }
        if(Input::has('editing') && Input::get('editing') > 0)
        {


            App::find(Input::get('editing'))->update(Input::except('editing'));

            return Redirect()->back();

        }


    }

    public function viewSponsorships()
    {
        return view('apps.sponsorships.sponsors', [
            'sponsors' => App::where('type', 1)->get()
        ]);
    }
    public function viewTools()
    {
        return view('apps.tools.tools', [
            'sponsors' => App::where('type', 2)->get()
        ]);
    }

}
