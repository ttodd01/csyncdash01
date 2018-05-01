@extends('layouts.app_dashboard')

@section('content')
    <div class="row text-center">

    <div class="tab-content">
        <div class="tab-pane fade active in">


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Stolen Video</th>
<th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($channels as $partner)

                        <tr>
                            <td>{{$partner->id}}</td>
                            <td>{{$partner->stolen_vid_url}}</td>
                            <td>{{$partner->created_at->diffForHumans()}}</td>
                            <td><a href="/claims/view/{{ $partner->id}}"><button class="btn btn-primary btn-xs">View Claim</button></a></td>
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