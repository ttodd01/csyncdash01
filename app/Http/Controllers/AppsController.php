<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    public function viewSponsorships()
    {
        return view('apps.sponsorships.sponsors', [

        ]);
    }
    public function viewTools()
    {
        return view('apps.tools.tools', [

        ]);
    }
}
