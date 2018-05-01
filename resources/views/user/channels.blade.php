@extends('layouts.app_dashboard')

@section('content')
            <div class="panel panel-inverse" data-sortable-id="table-basic-2">
                <h3 class="m-t-10"><i class="fa fa-youtube-play"></i> Add Your YouTube Channels!</h3>
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="{{url('/youtube/auth')}}"><i class="fa fa-youtube-play">Connect Another Channel</i></a>

                    </div>
                    <h4 class="panel-title">YouTube Channels</h4>
                </div>

                <div class="row text-center">
                    <div class="col-md-3">
                        <h1>
                            {{Auth::user()->youtubeChannels()->count()}}
                        </h1>
                        <p>Channel(s)</p>
                    </div>
                    <div class="col-md-3">
                        <h1>

                            {{Auth::user()->youtubeChannels()->sum('views')}}
                        </h1>
                        <p>Views</p>

                    </div>
                    <div class="col-md-3">
                        <h1>
                            {{Auth::user()->youtubeChannels()->sum('subscribers')}}
                        </h1>
                        <p>subscribers</p>

                    </div>
                    <div class="col-md-3">
                        <h1>
                            {{Auth::user()->youtubeChannels()->sum('videos')}}
                        </h1>
                        <p>Videos</p>

                    </div>
                </div>
                <div class="panel-body">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Channel Username</th>
                            <th> Views</th>
                            <th> Subscribers</th>
                            <th> Videos</th>
                            <th> Link Status</th>

                            <th>Channel</th>
                            <th>Socialblade</th>
                        </tr>
                        </thead>
                        @foreach(Auth::user()->youtubeChannels as $youtube)

                            <tbody>
                            <tr>
                                <td>{{$youtube->id}}</td>
                                <td>{{$youtube->username}}</td>
                                <td>{{$youtube->views}}</td>
                                <td>{{$youtube->subscribers}}</td>
                                <td>{{$youtube->videos}}</td>
<td> @if($youtube->has_connected_channel == 0)Unlinked @else Linked @endif</td>
                                <td><a href="https://youtube.com/channel/{{$youtube->channel_id}}">View Channel</a> </td>
                                <td><a href="https://socialblade.com/youtube/channel/{{$youtube->channel_id}}">View On Socialblade</a> </td>

                            </tr>
                            </tbody>
                        @endforeach


                    </table>
                </div>
            </div>


@endsection


@section('js')
    <script src="{{asset('assets/plugins/masked-input/masked-input.min.js')}}"></script>
    <script>
        $("#masked-input-phone").mask("(999) 999-9999");
    </script>
@endsection
