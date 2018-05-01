@extends('layouts.app_dashboard')


@section('content')

    <div class="panel panel-body">
        <ul class="list-inline list-unstyled" style="margin-bottom:-5px;">
            <li>
                <a href="/gear/all" class="btn btn-info">
                    All Gear
                </a>
            </li>
            @foreach($all_categories as $category)
                <li>
                    <a href="/gear/{{$category->id}}" class="btn btn-info">
                        {{$category->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


    @if($gear->count())

        @foreach($gear->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $g)


                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="panel panel-default">
                            <img src="{{$g->picture}}" class="img-responsive">
                            <div class="panel-body">
                                <h3>{{$g->title}}</h3>
                                <hr>
                                {!! str_limit($g->description, 200, '... <small><strong>view the product on amazon to see more</strong></small>') !!}

                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#gear-info{{$g->id}}" type="button"><i class="fa fa-info-circle"></i> View Product Information</button>
                                        {!! view('partials.gear-information-modal', ['gear' => $g]) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{$g->link}}" target="_blank" class="btn btn-block btn-info">
                                            <i class="fa fa-amazon"></i> View on Amazon
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach
            </div>
        @endforeach

    @else
        <h1 class="text-white text-center">There is no gear in this category!</h1>
    @endif

@endsection