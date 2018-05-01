<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Jonasva\GoogleTrends\GoogleSession;
use Jonasva\GoogleTrends\GoogleTrendsRequest;

class TrendsController extends Controller
{

    private $google_session;

    public function __construct()
    {

            $config = [
                'email'         => 'dashboardzychon@gmail.com',
                'password'      => 'DeveloperPassword123',
                'recovery-email'=> 'dan@zychon.yt',
            ];
            $this->google_session = (new GoogleSession($config))->authenticate();




    }


    public function getTrends()
    {

            return view('trends.trends', [

            ]);


    }

    public function getTrendsTable($type)
    {

        if ($type == "search") {
            $search_term = Input::get('term');

            $data = null;
                $response = (new GoogleTrendsRequest($this->google_session))// create request
                ->addTerm($search_term)// add a term to compare
                ->setDateRange(Carbon::now()->subMonth(1), Carbon::now())// date range
                ->getGraph()// cid (linechart)
                ->send(); //execute the request

                $data = $response->jsonDecode(); // return formatted data suitable for creating a line chart
                return view('partials.trends-table', [
                    'data' => $data,
                    'term_name' => $search_term
                ]);

        } elseif ($type == "topQueries") {
            $topQueries = (new GoogleTrendsRequest($this->google_session))
                ->setDateRange(Carbon::now()->subWeek(1), Carbon::now())// date range, if not passed, the past year will be used by default
                ->getTopQueries()// cid (top queries)
                ->send(); //execute the request
            $topQueriesData = $topQueries->getTermsObjects(); // return an array of GoogleTrendsTerm objects

            return view('partials.top-queries-table', [
                'data' => $topQueriesData
            ]);


        } elseif ($type == "risingQueries") {

            $risingQueries = (new GoogleTrendsRequest($this->google_session))
                ->setDateRange(Carbon::now()->subWeek(1), Carbon::now())// date range, if not passed, the past year will be used by default
                ->getRisingQueries()// cid (top queries)
                ->send(); //execute the request

            $risingQueriesData = $risingQueries->getTermsObjects(); // return an array of GoogleTrendsTerm objects

            return view('partials.rising-queries-table', [
                'data' => $risingQueriesData
            ]);


        }





    }

}
