@extends('layouts.app_dashboard')

@section('content')



    <div class="tab-content">
        <div class="tab-pane fade active in">
<div class="row">
    <a target="_blank" href="{{url('/networks/partners/users-download')}}"><button type="button" class="btn btn-primary ">Export Users
        </button></a>

</div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Owner Name</th>
                        <th>Email</th>
                        <th>Rank</th>
                        <th>Head Network</th>
                        <th>Time Ago</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pending_partners as $partner)

                        <tr>
                            <td>{{$partner->id}}</td>
                            <td>{{$partner->username}}</td>
                            <td>{{$partner->full_name}}</td>
                            <td>{{$partner->email}}</td>
                            <td>{{$partner->getRank()->name}}</td>
                            <td>{{$partner->getHeadNetwork()->name}}</td>
                            <td>{{$partner->created_at->diffForHumans()}}</td>
                            <td><a href="{{route('network.user', $partner->id)}}"><button class="btn btn-primary btn-xs">View User</button></a></td>
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