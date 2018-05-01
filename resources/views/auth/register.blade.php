@extends('layouts.app_register')

@section('content')




    <div id="page-container" class="fade">
        <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1434064511983-18c6dae20ed5?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=5f29d037842c14cb81cddea387221b20" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-money text-success"></i> CreatorSync</h4>
                    <p>
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Sign Up
                    <small>Apply to join CreatorSync, we can't wait to work with you!</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <label class="control-label">Full Name</label>
                        <div class="row m-b-15">
                            <div class="col-md-12 {{ $errors->has('full_name') ? ' has-error' : '' }} ">
                                <input type="text" name="full_name" class="form-control" placeholder="" />
                                @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="control-label">Username</label>
                        <div class="row m-b-15">
                            <div class="col-md-12 {{ $errors->has('username') ? ' has-error' : '' }}">
                                <input type="text" name="username" class="form-control" placeholder="" />
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="control-label">PayPal Email</label>
                        <div class="row m-b-15">
                            <div class="col-md-12 {{ $errors->has('paypal_email') ? ' has-error' : '' }}">
                                <input type="email" name="paypal_email" class="form-control" placeholder="" />
                                @if ($errors->has('paypal_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paypal_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="control-label">Email</label>
                        <div class="row m-b-15">
                            <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" name="email" class="form-control" placeholder="" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                  <label class="control-label">dailymotion</label>
                                                <div class="row m-b-15">
                                                    <div class="col-md-12 {{ $errors->has('dailymotion') ? ' has-error' : '' }}">
                                                        <input type="text" name="dailymotion" class="form-control" placeholder="" />
                                                        @if ($errors->has('dailymotion'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('dailymotion') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        <label class="control-label">Password</label>
                        <div class="row m-b-15">
                            <div class="col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" name="password" class="form-control" placeholder="" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="control-label">Password Confirmation</label>
                        <div class="row m-b-15">
                            <div class="col-md-12 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="" />
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" /> By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Policy</a>, including our <a href="#">Cookie Use</a>.
                            </label>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            Already a member? Click <a href="{{ url('/login') }}">here</a> to login.
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; CreatorSync
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->

    </div>

@endsection
