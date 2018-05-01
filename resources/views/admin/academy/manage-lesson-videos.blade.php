@extends('layouts.app')

@section('content')

    @include('errors')
    @include('success')

    <div class="row">
        <div class="col-md-12">
            <ul class="list-inline list-unstyled">
                <li>
                    <a class="btn btn-info" href="/admin/creator_academy">Manage Lessons/Courses</a>
                </li>
                <li>
                    <a class="btn btn-info" href="/admin/creator_academy/videos">Manage Lesson Videos</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="panel panel-body">
                <h4 class="text-amethyst-dark text-center">Select Lesson To Edit Videos</h4>
                {!! Form::open() !!}
                {!! Form::hidden('select_lesson_for_videos', 1) !!}
               <div class="form-group">

                    <select name="lesson_id" id="lesson_id" class="form-control">
                        @foreach(\App\Models\AcademyLessons::all() as $lesson)
                            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" onclick="addNewCategory()"><i class="fa fa-plus"></i> Edit Lesson Videos</button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="panel panel-body">
                <h4 class="text-amethyst-dark text-center">Add video to lesson</h4>
                {!! Form::open() !!}
                {!! Form::hidden('add_video', 1) !!}
                <div class="form-group">

                    <select name="lesson_id" class="form-control">
                        @foreach(\App\Models\AcademyLessons::all() as $lesson)
                            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">


                    <label>Video id(Everything after: https://www.youtube.com/watch?v= <- ONLY the id</label>
                    <input name="video_id" type="text" class="form-control">


                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" type="submit"><i class="fa fa-plus"></i> Add video to lesson</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
        <div class="col-md-8">
            @if(Session::has('edit'))

                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('edit')->getVideos->count())
                        @foreach(session('edit')->getVideos->chunk(3) as $chunk)
                            <div class="row">
                                @foreach($chunk as $video)
                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <a href="http://youtube.com/watch?v={{$video->video_id}}">
                                                <img src="{{$youtube->getVideoInfo($video->video_id)->snippet->thumbnails->default->url}}" class="img-responsive">
                                            </a>
                                            <div class="panel-body">
                                                <h4>{{$youtube->getVideoInfo($video->video_id)->snippet->title}}</h4>
                                                <hr>
                                                <ul class="list-inline list-unstyled">
                                                    <li>
                                                        {!! Form::open() !!}
                                                        {!! Form::hidden('delete_video', $video->id) !!}
                                                        {!! Form::hidden('video_lesson_id', $video->lesson_id) !!}

                                                        <div class="form-group">
                                                            <button class="btn btn-danger btn-xs" type="submit">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>

                                                        {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        @endforeach
                        @else
                        <h2 class="text-center">No Videos for this lesson!</h2>
                        @endif
                    </div>
                </div>

            @endif
        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function() {
            // Init page helpers (Summernote + CKEditor plugins)
            App.initHelpers(['ckeditor']);
        });
    </script>
@endsection