@extends('layouts.app_dashboard')


@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit App
                </div>
                {!! Form::open() !!}
                <div class="panel-body">

                    <select name="edit_app" class="form-control">
                    @foreach(\App\Models\Apps\App::all() as $app)
                        <option value="{{$app->id}}">{{$app->title}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="panel-footer clearfix">
                    <button class="btn btn-info pull-right" type="submit">Edit App</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new app
                </div>

                {!! Form::open() !!}
                {!! Form::hidden('editing', Session::has('editing') ? session('editing')->id : 0) !!}
                <div class="panel-body">


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Title</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="title" value="{{Session::has('editing') ? session('editing')->title : ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Small Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="small_description">{{Session::has('editing') ? session('editing')->small_description : ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Links out?</label>
                            </div>
                            <div class="col-md-8">
                                <div class="checkbox">
                                    <label>
                                        @if(Session::has('editing'))
                                            {!! Form::checkbox('links_out', '1', session('editing')->links_out, ['id' => 'links_out'] ) !!}
                                        @else
                                            {!! Form::checkbox('links_out', '1', false, ['id' => 'links_out'] ) !!}
                                        @endif
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="linksTo" {!! Session::has('editing') ? '' : 'style="display: none;"' !!}>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Link to URL</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="link" value="{{Session::has('editing') ? session('editing')->link : ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Image URL</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="image_url" value="{{Session::has('editing') ? session('editing')->image_url : ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Tag</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="tag" value="{{Session::has('editing') ? session('editing')->tag : ''}}">
                                <small>This is for the app sorting plugin, if it doesn't match a currently added one, it will create a unique one.</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="labelCustom">Type</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="type">
                                    @if(Session::has('editing'))
                                        <option value="{{session('editing')->type}}">{{session('editing')->type == 1 ? "Sponsorship" : "Tool"}}</option>

                                    @endif
                                    <option value="1">Sponsorship</option>
                                    <option value="2">Tool</option>
                                </select>

                            </div>
                        </div>
                    </div>





                </div>

                <div class="panel-footer clearfix">
                    <button class="btn btn-info pull-right" type="submit">Create App!</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection


@section('css')

@endsection

@section('js')

    <script>
        @if(!Session::has('editing'))
        $('#links_out').click(function() {
            $("#linksTo").slideToggle(this.checked);
        });
        @endif




    </script>

@endsection