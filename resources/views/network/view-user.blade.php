@extends('layouts.app_dashboard')

@section('content')

    <div class="">
        <div class="tab-pane fade active in" id="UserAccount">

            <div class="row">
                <div class="col-md-3">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user"></i> {{$user->full_name}}
                        </div>
                        <div class="panel-body">

                            <img src="{{$user->getPicture()}}" class="img-responsive img-thumbnail center-block">

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="labelCustom">User ID</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="user_id" class="form-control" value="{{$user->id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="labelCustom">Role</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="role" class="form-control" value="{{$user->getRank()->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="labelCustom">Rev Share</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="role" class="form-control" value="TO BE ADDED">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <i class="fa fa-pencil"></i> Account Information
                        </div>
                        <div class="panel-body">


                            {!! Form::open() !!}


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Full name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="full_name" value="{{$user->full_name}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Username</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="username" value="{{$user->username}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="email" value="{{$user->email}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">PayPal Email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="paypal_email" value="{{$user->paypal_email}}" disabled>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Phone Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="phone_number" value="{{$user->phone_number}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="address" disabled>{{$user->address}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Bio</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="bio" disabled>{{$user->bio}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Country</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="country" value="{{$user->country}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Gender</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" name="gender" value="{{$user->gender}}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="labelCustom">Birthday</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Day</label>
                                                <input class="form-control" name="birth_day" value="{{$user->birth_day}}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Month</label>
                                                <input class="form-control" name="birth_month" value="{{$user->birth_month}}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Year</label>
                                                <input class="form-control" name="birth_year" value="{{$user->birth_year}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>
                @if($user->rank == 1)

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage User
                        </div>
                        <div class="panel-body">


                            {!! Form::open() !!}
                            {!! Form::hidden('accept_user', $user->id) !!}
                            <div class="form-group">
                                <button class="btn btn-block btn-info" type="submit"><i class="fa fa-check-circle"></i> Accept user</button>
                            </div>
                            {!! Form::close() !!}

                            {!! Form::open() !!}
                            {!! Form::hidden('decline_user') !!}
                            <div class="form-group">
                                <button class="btn btn-block btn-danger" type="submit"><i class="fa fa-times-circle"></i> Decline user</button>
                            </div>
                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>



    </div>


@endsection


@section('css')

@endsection

@section('js')

@endsection