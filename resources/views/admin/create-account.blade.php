@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-body">

                    @include('partials.errors')

                    <form method="post" action="{{url('/admin/create_user')}}">

                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label>User's Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>User's Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>User's Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>User is Admin?</label>
                            <br>
                            <input type="checkbox" name="is_admin" value="1">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block">
                                <i class="fa fa-save"></i> Create User
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>




@endsection