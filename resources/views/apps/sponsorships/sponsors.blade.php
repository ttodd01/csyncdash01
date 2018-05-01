@extends('layouts.app_dashboard')


@section('content')


    <div id="options" class="m-b-10">
        <span class="gallery-option-set" id="filter" data-option-key="filter">
            <a href="#show-all" class="btn btn-default btn-xs active" data-option-value="*">
                Show All
            </a>
            @foreach(\App\Models\Apps\App::getAllTags(1) as $tag)
                <a href="#{{$tag}}" class="btn btn-default btn-xs" data-option-value=".{{$tag}}">
                    {{str_replace("_", " ", $tag)}}
                </a>
            @endforeach

          </span>
    </div>
    <div id="gallery" class="gallery">

        @foreach($sponsors as $sponsor)

            <div class="image {{str_replace(" ", "_", $sponsor->tag)}}">
                <div class="image-inner">
                    <a href="{{$sponsor->link}}" {{str_replace(" ", "_", $sponsor->tag)}}>
                        <img src="{{$sponsor->image_url}}" alt="" />
                    </a>
                    <p class="image-caption">
                        {{$sponsor->title}}
                    </p>
                </div>
                <div class="image-info">
                    <h5 class="title">{{$sponsor->title}}</h5>
                    <div class="pull-right">
                        <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                    </div>
                    <div class="desc">
                        {{$sponsor->small_description}}
                    </div>
                </div>
            </div>

        @endforeach


    </div>

@endsection

@section('css')
    <link href="{{ asset('assets/plugins/isotope/isotope.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet" />

@endsection

@section('js')
        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('assets/plugins/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightbox/js/lightbox-2.6.min.js') }}"></script>
    <script src="{{ asset('assets/js/gallery.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {
            Gallery.init();
        });
    </script>
@endsection