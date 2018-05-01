@extends('layouts.app_dashboard')


@section('content')

    @include('errors')
    @include('success')

    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">

                @if($can_request)


                {!! Form::open() !!}

                {!! Form::hidden('user_id', Auth::user()->id) !!}
                    <div class="panel-body">

                            <div class="form-group">
                                <label>Channel</label>
                                <input class="form-control" disabled value="{{Auth::user()->getChannel->username}}({{Auth::user()->getChannel->channel_id}})">
                            </div>
                            <div class="form-group">
                                <label>Skype Name</label>
                                <input class="form-control" name="skype">
                            </div>

                            <div class="form-group">
                                <label>Graphics Type?</label>
                                <select class="form-control" name="type">
                                    <option value="1">Banner</option>
                                    <option value="2">Video Thumbnail</option>
                                    <option value="3">Avatar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Extra ideas? <small>Colors, Images, Text etc</small>
                                </label>
                                <textarea class="form-control" name="extra_details" rows="4"></textarea>
                            </div>


                    </div>

                    <div class="panel-footer clearfix">
                        <button type="submit" class="pull-right btn btn-info"><i class="fa fa-paint-brush"></i> Request Graphics!</button>
                    </div>
                {!! Form::close() !!}

                @else
                <h2 class="text-center">
                    There is a one week cool down for graphics!
                </h2>
                @endif

            </div>

        </div>

        <div class="col-md-6">

            <div class="panel panel-body">
                <h2 class="text-center">
                    <i class="fa fa-clock-o"></i> All of your pending/completed Requests
                </h2>
                <br>

                @if(Auth::user()->getGraphicsRequests()->count())

                    @foreach(Auth::user()->getGraphicsRequests as $request)

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <span class="text-muted">Added {{$request->created_at->diffForHumans()}} - Type <strong>{{$request->getRequestType()}}</strong> - Status <strong>{{$request->getStatus()}}</strong></span>
                                <hr>
                                <p>
                                    {!! $request->extra_details !!}
                                </p>

                                @if($request->status == 2)
                                    <hr>
                                    <strong>Your graphics are completed, please check your skype or email!</strong>
                                @endif

                            </div>
                        </div>

                    @endforeach

                @else
                    <h2 class="text-center">You have no pending/completed requests!</h2>
                @endif

            </div>

        </div>
    </div>

@endsection