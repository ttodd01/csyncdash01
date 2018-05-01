@extends('layouts.app_login')

@section('content')





    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">


            </div>
            <!-- end brand -->
            <div class="login-content">
                <form class="margin-bottom-0" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} m-b-20">
                        <input type="email" name="email" class="form-control input-lg" value="{{ old('email') }}" placeholder="Email Address" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} m-b-20">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input name="remember" type="checkbox" /> Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg"> <i class="fa fa-btn fa-sign-in"></i> Sign In</button>
                    </div>
                    <div class="m-t-20">
                        Not a member yet? Click <a href="{{ url('/register') }}">here</a> to register.
                    </div>
                    <div class="m-t-20">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>


                </form>
            </div>
        </div>
    </div>


@endsection
