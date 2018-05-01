@extends('layouts.app_dashboard')

@section('content')

    <ul class="nav nav-pills">
        <li class=""><a href="{{route('network.partners')}}" >My Partners</a></li>
        <li class=""><a href="{{route('network.settings')}}" >Network Settings</a></li>
    </ul>


    <div class="tab-content">
        <div class="tab-pane fade active in">


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Owner Name</th>
                        <th>Email</th>
                        <th>Rank</th>
                        <th>Time Ago</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($networks as $network)

                        <tr>
                            <td>{{$network->getOwner()->id}}</td>
                            <td>{{$network->name}}</td>
                            <td>{{$network->getOwner()->full_name}}</td>
                            <td>{{$network->getOwner()->email}}</td>
                            <td>{{$network->getOwner()->getRank()->name}}</td>
                            <td>{{$network->created_at->diffForHumans()}}</td>
                            <td><a href="{{route('network.user', $network->getOwner()->id)}}"><button class="btn btn-primary btn-xs">View User</button></a></td>
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