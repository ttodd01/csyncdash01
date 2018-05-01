@extends('layouts.app_dashboard')

@section('content')


    @foreach($courses->chunk(4) as $chunk)

        <div class="row">
            @foreach($chunk as $course)


                <div class="col-md-3">
                    <a class="block block-rounded block-link-hover2" href="{{url('/academy/course/'.$course->id)}}">
                        <img src="{{$course->image_url}}" class="img-responsive" style="width: 100%;">
                        <div class="block-content block-content-full text-center bg-city ribbon ribbon-bookmark ribbon-crystal">
                            <div class="text-white-op">
                                <em>{{$course->getLessons()->count()}} lessons</em>
                            </div>
                        </div>
                        <div class="block-content mheight-125">
                            <h4>{{$course->title}}</h4>
                            <p>
                                {{$course->description}}
                            </p>
                        </div>
                    </a>
                </div>


            @endforeach

        </div>
    @endforeach





@endsection
