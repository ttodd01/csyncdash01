<?php

namespace App\Http\Controllers;

use App\Models\Network\Network;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteController extends Controller
{
    public function showPost($slug) {
        $post = Network::whereSlug($slug);
        return view('pages.post', compact('post'));
    }
}
