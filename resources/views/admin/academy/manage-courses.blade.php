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

                <h3 class="text-center">Manage Courses</h3>
                <br>

                {!! Form::open() !!}
                {!! Form::hidden('select_course', 1) !!}

                <div class="form-group">

                    <select class="form-control" name="course">
                        @foreach(\App\Models\AcademyCourses::all() as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" type="submit">
                        <i class="fa fa-cog"></i> Manage
                    </button>
                </div>

                {!! Form::close() !!}

            </div>
            <div class="panel panel-body">

                <h3 class="text-center">Manage Lessons</h3>
                <br>

                {!! Form::open() !!}
                {!! Form::hidden('select_lesson', 1) !!}

                <div class="form-group">

                    <select class="form-control" name="lesson">
                        @foreach(\App\Models\AcademyLessons::all() as $lesson)
                            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" type="submit">
                        <i class="fa fa-cog"></i> Manage
                    </button>
                </div>

                {!! Form::close() !!}

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Course
                </div>
                {!! Form::open() !!}
                {!! Form::hidden('create_course', 1) !!}
                <div class="panel-body">
                    <div class="form-group">
                        <label>Course Title</label>
                        <input class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Course Image</label>
                        <input class="form-control" name="image_url">
                    </div>
                    <div class="form-group">
                        <label>Course Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="panel-footer clearfix">
                    <button class="btn btn-info pull-right" type="submit"><i class="fa fa-edit"></i> Save Edits</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>


        <div class="col-md-8">

            @if(Session::has('course'))

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Course - {{session('course')->title}}
                    </div>
                    {!! Form::open() !!}
                    {!! Form::hidden('edit_course', session('course')->id) !!}
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Course Title</label>
                            <input class="form-control" name="title" value="{{session('course')->title}}">
                        </div>
                        
                    <div class="form-group">
                        <label>Course Image</label>
                        <input class="form-control" name="image_url">
                    </div>
                        <div class="form-group">
                            <label>Course Description</label>
                            <textarea class="form-control" name="description">{{session('course')->description}}</textarea>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <button class="btn btn-info pull-right" type="submit"><i class="fa fa-edit"></i> Save Edits</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            @endif

            @if(Session::has('lesson'))

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Lesson - {{session('lesson')->title}}
                        </div>
                        {!! Form::open() !!}
                        {!! Form::hidden('edit_lesson', session('lesson')->id) !!}
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Which Course is the Lesson under?</label>
                                <select class="form-control" name="course_id">
                                    <option value="{{session('lesson')->getCourse->id}}">{{session('lesson')->getCourse->title}}</option>
                                    @foreach(\App\Models\AcademyCourses::all() as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lesson Title</label>
                                <input class="form-control" name="title" value="{{session('lesson')->title}}">
                            </div>
                            <div class="form-group">
                                <label>Lesson Length(Minutes)</label>
                                <input class="form-control" name="length_in_minutes" type="number" value="{{session('lesson')->length_in_minutes}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="type">
                                    <option value="{{session('lesson')->type}}">{{session('lesson')->getLessonType()}}</option>
                                    <option value="0">Intro</option>
                                    <option value="1">Basics</option>
                                    <option value="2">Advanced</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea id="js-ckeditor" name="course_text">{{session('lesson')->course_text}}</textarea>
                            </div>
                        </div>
                        <div class="panel-footer clearfix">
                            <button class="btn btn-info pull-right" type="submit"><i class="fa fa-edit"></i> Save Edits</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
            @else

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Lesson
                    </div>
                    {!! Form::open() !!}
                    {!! Form::hidden('create_lesson', 1) !!}
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Which Course is the Lesson under?</label>
                            <select class="form-control" name="course_id">
                                @foreach(\App\Models\AcademyCourses::all() as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lesson Title</label>
                            <input class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Lesson Length(Minutes)</label>
                            <input class="form-control" name="length_in_minutes" type="number">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type">
                                <option value="0">None</option>
                                <option value="1">Intro</option>
                                <option value="2">Basics</option>
                                <option value="3">Advanced</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Course Description</label>
                            <textarea id="js-ckeditor" name="course_text"></textarea>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <button class="btn btn-info pull-right" type="submit"><i class="fa fa-edit"></i> Save Edits</button>
                    </div>
                    {!! Form::close() !!}
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