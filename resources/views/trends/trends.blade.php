@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Top Search Queries in the last Week
                </div>
                <div class="panel-body" id="top_queries">

                    <h1 class="text-center" id="top_queries_loader" style="display: none; color: #1d98ff;"><i class="fa fa-spinner fa-spin fa-5x"></i></h1>

                </div>
            </div>


        </div>
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Rising Queries in the last Week
                </div>
                <div class="panel-body" id="rising_queries">

                    <h1 class="text-center" id="rising_queries_loader" style="display: none; color: #1d98ff;"><i class="fa fa-spinner fa-spin fa-5x"></i></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Search
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label>Search for one word at a time</label>
                <input type="text" id="search_box" class="form-control" typeof="text">
            </div>

        </div>
    </div>

    <div class="row" style="display: none;" id="loading_block">
        <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-body text-center">
                <h1 style="color: #1d98ff;"><i class="fa fa-spinner fa-spin fa-5x"></i></h1>
            </div>

        </div>
    </div>


    <div class="panel panel-default" id="trends_panel" style="display: none;">
        <div class="panel-heading">
            Trends results for the last month
        </div>
        <div class="panel-body" id="trends_data">

        </div>
    </div>

@endsection

@section('js')

        <!-- Page Plugins -->
    <script src="{{ asset('assets/js/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script>jQuery(function(){App.initHelpers('slick');});</script>

    <script>

        var search          = $('#search_box');
        var trends_panel    = $('#trends_panel');
        var trends_data     = $('#trends_data');
        var loading_block   = $('#loading_block');
        var rising_queries   = $('#rising_queries');
        var top_queries   = $('#top_queries');
        var rising_queries_loader   = $('#rising_queries_loader');
        var top_queries_loader   = $('#top_queries_loader');



        search.keypress(function(e)
        {
            if(e.which == 13)
            {
                trends_panel.hide();
                loading_block.hide();
                trends_data.html("");
                loading_block.fadeIn();

                $.ajax({
                    url: "/get_trends_table/search",
                    type: "POST",
                    data: {
                        term: search.val()
                    },
                    success: function (results) {
                        trends_data.html(results);
                        loading_block.fadeOut();
                        trends_panel.delay(500).fadeIn('slow');
                    }
                });

            }
        });

        $(function() {
            rising_queries_loader.fadeIn();
            top_queries_loader.fadeIn();


            $.ajax({
                url: "/get_trends_table/topQueries",
                type: "POST",
                success: function (results) {
                    top_queries.html(results);
                }
            });
            $.ajax({
                url: "/get_trends_table/risingQueries",
                type: "POST",
                success: function (results) {
                    rising_queries.html(results);
                }
            });



        });



    </script>

@endsection