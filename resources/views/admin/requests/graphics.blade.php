@extends('layouts.app_dashboard')

@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="panel panel-default">
                <div class="panel-heading">
                    Pending & In Progress on Requests
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-borderless">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Skype</th>
                            <th class="hidden-xs" style="width: 15%;">Type</th>
                            <th class="hidden-xs" style="width: 15%;">Status</th>
                            <th class="text-center" style="width: 200px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($pending_requests as $request)

                            <tr>
                                <td class="text-center">{{$request->id}}</td>
                                <td>{{$request->getUser->name}}</td>
                                <td>{{$request->getUser->email}}</td>
                                <td>{{$request->skype}}</td>
                                <td class="hidden-xs">
                                    <span class="label label-success">{{$request->getRequestType()}}</span>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-success">{{$request->getStatus()}}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">

                                        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#graphic-info-{{$request->getUser->id}}" type="button"><i data-toggle="tooltip"  title="" data-original-title="View Details" class="fa fa-eye"></i></button>

                                            {!! view('partials.admin.graphics-request-information', ['user' => $request->getUser, 'request' => $request]) !!}
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" onclick="setStatus('{{$request->id}}', 2)" data-original-title="Mark As Complete"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" onclick="setStatus('{{$request->id}}', 1)" data-original-title="Mark as In Progress"><i class="fa fa-cogs"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" onclick="setStatus('{{$request->id}}', 3)" data-original-title="Mark as Canceled"><i class="fa fa-times"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" onclick="setStatus('{{$request->id}}', 0)" data-original-title="Set back to Pending"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    All Tasks
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-borderless">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Skype</th>
                            <th class="hidden-xs" style="width: 15%;">Type</th>
                            <th class="hidden-xs" style="width: 15%;">Status</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($requests as $request)

                            <tr>
                                <td class="text-center">{{$request->id}}</td>
                                <td>{{$request->getUser->name}}</td>
                                <td>{{$request->getUser->email}}</td>
                                <td>{{$request->skype}}</td>
                                <td class="hidden-xs">
                                    <span class="label label-success">{{$request->getRequestType()}}</span>
                                </td>
                                <td class="hidden-xs">
                                    <span class="label label-success">{{$request->getStatus()}}</span>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('js')

    <script>


        function setStatus(request_id, status)
        {
            $.ajax({
                url: '/admin-api/set_status/'+request_id+'/'+status,
                type: 'POST',
                success: function (results) {

                    showNotification(results, 'success');

                    location.reload();
                }
            });
        }


    </script>

@endsection