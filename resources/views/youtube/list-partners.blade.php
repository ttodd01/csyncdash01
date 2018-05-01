@extends('layouts.app_dashboard')

@section('content')
<div class="row">
    <a target="_blank" href="{{url('/youtube/channels/users-download')}}"><button type="button" class="btn btn-primary ">Export Channels</button></a>

</div>
    <div class="row text-center">


    <div class="tab-content">
        <div class="tab-pane fade active in">


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Daily Motion Channel</th>
                        <th>Revenue Share</th>
                        <th>CMS Status</th>
<th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pending_partners as $partner)

                        <tr>
                            <td>{{$partner->id}}</td>
                            <td>{{$partner->full_name}}</td>
                                                        <td>{{$partner->dailymotion}}</td>
                                                        <td>{{$partner->rev_share}}%</td>

<td>  <span class="label label-default">@if($partner->has_connected_channel == 0)Unlinked @else Linked @endif</span></td>
                            <td>{{$partner->updated_at->diffForHumans()}}</td>
                            <td><a href="/youtube/user/{{ $partner->id}}"><button class="btn btn-primary btn-xs">View Channel</button></a></td>
                        </tr>


                    @endforeach




                    </tbody>
                </table>
            </div>




        </div>
    </div>

@endsection


@section('css')

@endsection

@section('js')

@endsection