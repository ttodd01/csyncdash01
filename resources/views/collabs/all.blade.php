@extends('layouts.app_dashboard')

@section('content')


    @if(Session::has('success'))

        <div class="alert alert-success">

            {!! session('success') !!}

        </div>

    @endif



    <div class="row">

        <div class="col-md-9">
            <?php

            $addedFirst = false;
            $itemNo = 0;

            ?>

            @if($itemNo == 0)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{asset('assets/img/avatars/avatar1.jpg')}}" class="center-block img-responsive img-circle" style="width:128px;">
                            <h3 class="text-center">You?</h3>
                            <hr>
                            <p class="text-center">
                                Add your profile to the collab hub.
                            </p>

                            @if(!\App\Models\Collaboration::where('user_id', Auth::user()->id)->count())

                                <div class="form-group">

                                    <form action="{{url('/collab')}}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="add_profile_for_collab" value="1">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="Write a short message"></textarea>
                                        </div>
                                        <div class="form-group">

                                            <button type="submit" class="btn btn-info btn-block btn-sm"><i class="fa fa-plus"></i> Add Profile</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <strong class="text-center">Your profile has already been added!</strong><br>

                                {!! Form::open() !!}
                                {!! Form::hidden('remove_profile', 1) !!}
                                <div class="form-group">

                                    <button type="submit" class="btn btn-info btn-block btn-sm"><i class="fa fa-trash"></i> Remove my Profile</button>

                                </div>

                                {!! Form::close() !!}
                            @endif

                        </div>
                    </div>
                </div>
                <?php $itemNo++; ?>
            @endif


            @if($collabs->count())


                @foreach($collabs->chunk(4) as $chunk)

                    @if($itemNo == 0)
                    @else
                        <div class="row">
                            @endif
                            @foreach($chunk as $collab)


                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <img src="{{$collab->getUser->getAvatar()}}" class="center-block img-responsive img-circle" style="width:128px;">
                                            <h3 class="text-center">{{$collab->getUser->name}}</h3>
                                            <hr>
                                            <p class="text-center">
                                                {{$collab->message}}
                                            </p>
                                            @if(!$collab->hasCollabedWith(Auth::user()->id))

                                                <div class="form-group">

                                                    <form action="{{url('/collab')}}" method="post">
                                                        {!! csrf_field() !!}
                                                        <input type="hidden" name="request_collab" value="{{$collab->getUser->id}}">
                                                        <button type="submit" class="btn btn-info btn-block btn-sm"><i class="fa fa-plus"></i> Request Collaboration</button>
                                                    </form>
                                                </div>
                                            @else
                                                <strong class="text-center">You have already requested to collaborate.</strong><br>
                                            @endif
                                            <span>Posted about <span class="text-muted">{{$collab->created_at->diffForHumans()}}</span></span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        @endforeach


                        @else

                            <h1 class="text-center">No Collaborations available</h1>

                        @endif
        </div>

        <div class="col-md-3">

            @if($mycollabs->count())

                @foreach($mycollabs as $collabInvitation)

                    <div class="panel panel-body">
                        <h4>{{$collabInvitation->getRequestingUser->name}} wants to collaborate with you!</h4>
                        <strong>Here's his email</strong><br>
                        <span class="text-muted">{{$collabInvitation->getRequestingUser->email}}</span>

                    </div>

                @endforeach


            @else

                <div class="panel panel-body">
                    <p class="text-center"><i class="fa fa-times"></i> You have no collaboration requests.</p>

                </div>

            @endif



        </div>

    </div>



@endsection
