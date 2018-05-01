@extends('layouts.app_dashboard')

@section('content')

<div class="row">
    <div class="col-md-4">



        {!! Form::open() !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil"></i> Submit your channel for a review
            </div>
            <div class="panel-body">
                <div class="form-group">
                    @if($can_request)
                    {!! Form::open() !!}
                    {!! Form::hidden('channel_submit', 1) !!}

                    <button class="btn btn-danger btn-block btn-lg"><i class="fa fa-youtube-play"></i> Submit your channel for a review</button>

                    {!! Form::close() !!}
                    @else
                        <h3 class="text-center">{{$reason}}</h3>
                    @endif
                </div>
            </div>
        </div>

        {!! Form::close() !!}

    </div>
    <div class="col-md-8">

        <div class="panel panel-body">

            <h1 class="text-center">
                <i class="fa fa-info-circle fa-1x"></i>
                This is where your reviews will be displayed
            </h1>
        </div>


        @if(Auth::user()->getReviewRequests()->count())
            @foreach(Auth::user()->getReviewRequests as $review)
                <div class="panel panel-default">
                    <div class="panel-body">

                        <span>Your submitted channel ID <strong>{{$review->channel_id}}</strong> - Status <strong>{{$review->getReviewStatus()}}</strong></span>

                        @if($review->status == 1)
                            <hr>
                            <strong>Your review is found in the Google Document below!</strong><br>
                            <a href="{{$review->doc_url}}">{{$review->doc_url}}</a>

                        @endif

                    </div>
                </div>
            @endforeach
        @else
            <div class="panel panel-body">

                <h2 class="text-center">You haven't submitted any requests!</h2>
            </div>
        @endif
    </div>
</div>

@endsection