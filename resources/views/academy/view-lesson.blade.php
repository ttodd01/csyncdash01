@extends('layouts.app_dashboard')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="block block-rounded block-content">

                <h1 class="text-center">{{$lesson->title}}</h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    @if($lesson->getVideos->count())
                        @foreach($lesson->getVideos->chunk(1) as $chunk)
                            <div class="row">
                                @foreach($chunk as $video)

                                    <div class="col-md-12">
                                    
                                    	<iframe width="100%" height="415" src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allowfullscreen></iframe>
                                    
                                        
                                    </div>

                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-center">No Videos for this lesson!</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block block-rounded">
                <div class="block-header bg-gray-lighter text-center">
                    <h3 class="block-title">About This Lesson</h3>
                </div>
                <div class="block-content">
                    <table class="table table-borderless table-condensed">
                        <tbody>
                        <tr>
                            <td>
                                <i class="fa fa-fw fa-clock-o push-10-r"></i> {{$lesson->length_in_minutes}} Minutes
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content">
                    {!!$lesson->course_text!!}
                </div>
            </div>



        </div>
    </div>


@endsection