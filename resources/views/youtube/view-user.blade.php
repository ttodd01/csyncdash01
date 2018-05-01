@extends('layouts.app_dashboard')

@section('content')


<div class="panel panel-default">
    <div class="panel-body ">

        <p>Daily Motion  Channel: <a href="https://dailymotion.com/{{$user->dailymotion}}">{{$user->dailymotion}}</a> </p>
       @if($user->has_connected_channel == 0)
            <strong>Channel Link Status:</strong>    Unlinked
        @else
            <strong>Channel Link Status:</strong>  Linked
        @endif
        <p><strong>Last updated:</strong> {{$user->updated_at->diffForHumans()}}</p>
    </div>
</div>
                           @if($user->has_connected_channel == 0)

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Manage Daily Motion  Channel
                            </div>
                            <div class="panel-body">


                                {!! Form::open() !!}
                                {!! Form::hidden('accept_user', $user->id) !!}
                                <div class="form-group">
                                    <button class="btn btn-block btn-info" type="submit"><i class="fa fa-check-circle"></i> Add to CMS</button>
                                </div>
                                {!! Form::close() !!}
                                <small>Note: When you click "Add to CMS" this will mark the channel as added to our CMS account. </small>

                            </div>
                        </div>
                    </div>
                @endif
                @if($user->has_connected_channel == 1)

                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Manage Daily Motion Channel
                            </div>
                            <div class="panel-body">


                                {!! Form::open() !!}
                                {!! Form::hidden('decline_user', $user->id) !!}
                                <div class="form-group">
                                    <button class="btn btn-block btn-danger" type="submit"><i class="fa fa-times-circle"></i> Remove from CMS</button>
                                </div>
                                {!! Form::close() !!}
                                <small>Note: When you click "Remove from CMS" this will mark the channel as removed from our CMS. </small>

                            </div>
                        </div>
                    </div>
                @endif

            </div>


@endsection


@section('css')

@endsection

@section('js')

@endsection