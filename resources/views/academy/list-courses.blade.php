@extends('layouts.app_dashboard')


@section('content')

    <div class="panel panel-body">

        <h1 class="text-center">{{$course->title}}</h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="block block-rounded">
                <div class="block-content">

                    @if($course->getLessonsByType(0)->count())
                    <table class="table table-borderless table-vcenter">
                        <tbody>
                        <tr class="active">
                            <th style="width: 50px;"></th>
                            <th></th>
                            <th class="font-s12 text-right">
                                <span class="text-muted">{{$lengths->none}} minutes long</span>
                            </th>
                        </tr>


                            @foreach($course->getLessonsByType(0) as $lesson)

                                <tr>
                                    <td class="success text-center">
                                        <i class="fa fa-fw fa-unlock text-success"></i>
                                    </td>
                                    <td>
                                        <a href="{{url('/academy/course/'.$course->id.'/lesson/'. $lesson->id)}}">{{$lesson->title}}</a>
                                    </td>
                                    <td class="text-right">
                                        <em class="font-s12 text-muted">{{$lesson->length_in_minutes}} minutes long</em>
                                    </td>
                                </tr>

                            @endforeach




                        </tbody>
                    </table>
                    @else
                    @endif

                    @if($course->getLessonsByType(1)->count())
                    <table class="table table-borderless table-vcenter">
                        <tbody>
                        <tr class="active">
                            <th style="width: 50px;"></th>
                            <th>Intro</th>
                            <th class="font-s12 text-right">
                                <span class="text-muted">{{$lengths->intro}} minutes long</span>
                            </th>
                        </tr>


                            @foreach($course->getLessonsByType(1) as $lesson)

                                <tr>
                                    <td class="success text-center">
                                        <i class="fa fa-fw fa-unlock text-success"></i>
                                    </td>
                                    <td>
                                        <a href="{{url('/academy/course/'.$course->id.'/lesson/'. $lesson->id)}}">{{$lesson->title}}</a>
                                    </td>
                                    <td class="text-right">
                                        <em class="font-s12 text-muted">{{$lesson->length_in_minutes}} minutes long</em>
                                    </td>
                                </tr>

                            @endforeach




                        </tbody>
                    </table>
                    @else
                    @endif

                    @if($course->getLessonsByType(2)->count())
                    <table class="table table-borderless table-vcenter">
                        <tbody>
                        <tr class="active">
                            <th style="width: 50px;"></th>
                            <th>Basics</th>
                            <th class="font-s12 text-right">
                                <span class="text-muted">{{$lengths->basic}} minutes long</span>
                            </th>
                        </tr>


                            @foreach($course->getLessonsByType(2) as $lesson)

                                <tr>
                                    <td class="success text-center">
                                        <i class="fa fa-fw fa-unlock text-success"></i>
                                    </td>
                                    <td>
                                        <a href="{{url('/academy/course/'.$course->id.'/lesson/'. $lesson->id)}}">{{$lesson->title}}</a>
                                    </td>
                                    <td class="text-right">
                                        <em class="font-s12 text-muted">{{$lesson->length_in_minutes}} minutes long</em>
                                    </td>
                                </tr>

                            @endforeach



                        </tbody>
                    </table>
                    @else
                        <h2 class="text-center"></h2>
                    @endif

                    @if($course->getLessonsByType(3)->count())
                    <table class="table table-borderless table-vcenter">
                        <tbody>
                        <tr class="active">
                            <th style="width: 50px;"></th>
                            <th>Advanced</th>
                            <th class="font-s12 text-right">
                                <span class="text-muted">{{$lengths->advanced}} minutes long</span>
                            </th>
                        </tr>

                            @foreach($course->getLessonsByType(3) as $lesson)

                                <tr>
                                    <td class="success text-center">
                                        <i class="fa fa-fw fa-unlock text-success"></i>
                                    </td>
                                    <td>
                                        <a href="{{url('/academy/course/'.$course->id.'/lesson/'. $lesson->id)}}">{{$lesson->title}}</a>
                                    </td>
                                    <td class="text-right">
                                        <em class="font-s12 text-muted">{{$lesson->length_in_minutes}} minutes long</em>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                        @else
                            <h2 class="text-center"></h2>
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="block block-rounded">
                <div class="block-header bg-gray-lighter text-center">
                    <h3 class="block-title">About This Course</h3>
                </div>
                <div class="block-content">
                    <table class="table table-borderless table-condensed">
                        <tbody>
                        <tr>
                            <td>
                                <i class="fa fa-fw fa-book push-10-r"></i> {{$course->getLessons()->count()}} Lessons
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-fw fa-clock-o push-10-r"></i> {{$lengths->total}} minutes
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    {{$course->description}}
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection