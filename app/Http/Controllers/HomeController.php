<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Youtube;

use App\Http\Requests;
use App\Models\Ranking\Ranks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('home');
    }
    public function added()
    {


        return view('added');
    }
    public function contact()
    {


        return view('contact');
    }
    public function picEdit()
    {


        return view('picedit');
    }
    public function contract() {
        return view('contract');
    }

}
