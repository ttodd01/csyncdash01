@extends('layouts.app_dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6">

            @if($reviews->count())
            @foreach($reviews as $review)

                <div class="panel panel-body">

                    <div class="row">

                        <div class="col-md-10">
                            <strong>{{$review->getUser->getChannel->username}}</strong>
                            <hr>
                            <span class="text-muted">Current Status <strong>{{$review->getReviewStatus()}}</strong></span>
                            <hr>
                            <button class="btn btn-default" data-toggle="modal" data-target="#review-{{$review->getUser->id}}" type="button"><i class="fa fa-check"></i> Insert Google Doc Link & Complete</button>

                            {!! view('partials.admin.input-doclink-and-complete', ['user' => $review->getUser, 'review' => $review]) !!}
                        </div>
                    </div>

                </div>

            @endforeach
            @else
                <h1 class="text-white text-center">There are no pending channel reviews!</h1>
            @endif

        </div>
        <div class="col-md-6">

            @if($completed->count())
            @foreach($completed as $review)

                <div class="panel panel-body">

                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{$review->getUser->getChannel->thumbnail}}" class="img-responsive img-circle">
                        </div>
                        <div class="col-md-10">
                            <strong>{{$review->getUser->getChannel->username}}</strong>
                            <hr>
                            <span class="text-muted">Current Status <strong>{{$review->getReviewStatus()}}</strong></span>
                            <hr>
                            <button class="btn btn-default" data-toggle="modal" data-target="#review-{{$review->getUser->id}}" type="button"><i class="fa fa-check"></i> Insert Google Doc Link & Complete</button>

                            {!! view('partials.admin.input-doclink-and-complete', ['user' => $review->getUser, 'review' => $review]) !!}
                        </div>
                    </div>

                </div>

            @endforeach
            @else
                <h1 class="text-white text-center">There are no completed channels!</h1>
            @endif

        </div>
    </div>

@endsection