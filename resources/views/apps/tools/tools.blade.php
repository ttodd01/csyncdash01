@extends('layouts.app_dashboard')


@section('content')


    <div id="options" class="m-b-10">
        <span class="gallery-option-set" id="filter" data-option-key="filter">
            <a href="#show-all" class="btn btn-default btn-xs active" data-option-value="*">
                Show All
            </a>


          </span>
    </div>
    <div id="gallery" class="gallery">


            <div class="image ">
                <div class="image-inner">
                    <a href="{{url('/collab')}}">
                        <img src="{{ asset('assets\img\header_logo.png') }}" alt="" />
                    </a>
                    <p class="image-caption">
                        Tool
                    </p>
                </div>
                <div class="image-info">
                    <h5 class="title">Collaborator</h5>
                    <div class="pull-right">
                        <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                    </div>
                    <div class="desc">
                        Information goes Here!
                    </div>
                </div>
            </div>



            <div class="image ">
                <div class="image-inner">
                    <a href="">
                        <img src="{{ asset('assets\img\header_logo.png') }}" alt="" />
                    </a>
                    <p class="image-caption">
                        Tool
                    </p>
                </div>
                <div class="image-info">
                    <h5 class="title">Reviewer</h5>
                    <div class="pull-right">
                        <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                    </div>
                    <div class="desc">
                        Information goes Here!
                    </div>
                </div>
            </div>

            <div class="image ">
                <div class="image-inner">
                    <a href="">
                        <img src="{{ asset('assets\img\header_logo.png') }}" alt="" />
                    </a>
                    <p class="image-caption">
                        Test
                    </p>
                </div>
                <div class="image-info">
                    <h5 class="title">Content ID Manager</h5>
                    <div class="pull-right">
                        <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                    </div>
                    <div class="desc">
                        Information goes Here!
                    </div>
                </div>
            </div>
            <div class="image ">
                            <div class="image-inner">
                                <a href="">
                                    <img src="{{ asset('assets\img\header_logo.png') }}" alt="" />
                                </a>
                                <p class="image-caption">
                                    Test
                                </p>
                            </div>
                            <div class="image-info">
                                <h5 class="title">Verification requester</h5>
                                <div class="pull-right">
                                    <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                                </div>
                                <div class="desc">
                                    Information goes Here!
                                </div>
                            </div>
                        </div>
                        <div class="image ">
                                        <div class="image-inner">
                                            <a href="">
                                                <img src="{{ asset('assets\img\header_logo.png') }}" alt="" />
                                            </a>
                                            <p class="image-caption">
                                            Test
                                            </p>
                                        </div>
                                        <div class="image-info">
                                            <h5 class="title">                                                Royalty Free Images
</h5>
                                            <div class="pull-right">
                                                <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                                            </div>
                                            <div class="desc">
                                                Information goes Here!
                                            </div>
                                        </div>
                                    </div>
                                            <div class="image ">
                                                                            <div class="image-inner">
                                                                                <a href="">
                                                                                    <img src="{{ asset('assets\img\header_logo.png') }}" alt="" />
                                                                                </a>
                                                                                <p class="image-caption">
Test                                                                               </p>
                                                                            </div>
                                                                            <div class="image-info">
                                                                                <h5 class="title">Recommended Gear  </h5>
                                                                                <div class="pull-right">
                                                                                    <small>by</small> <a href="javascript:;">{{Auth::user()->getHeadCompany->name}}</a>
                                                                                </div>
                                                                                <div class="desc">
                                                                                    Information goes Here!
                                                                                </div>
                                                                            </div>
                                                                        </div>
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