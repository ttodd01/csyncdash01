@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            @include('success')
            @include('errors')

            <table class="table table-striped table-borderless table-header-bg">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Name</th>
                    <th class="hidden-xs" style="width: 15%;">Logged In yet?</th>
                    <th class="hidden-xs" style="width: 15%;">Rank</th>
                    <th class="text-center" style="width: 200px;">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)

                    <tr id="client-table-{{$user->id}}">
                        <td class="text-center">{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td class="hidden-xs">
                            <i class="fa fa-{{$user->first_time_login == 0 ? 'times' : 'check'}}"></i>
                        </td>
                        <td class="hidden-xs">
                            <span class="label label-{{$user->is_admin == 0 ? 'success' : 'info'}}">{{$user->is_admin == 0 ? 'Standard User' : 'Administrator'}}</span>
                        </td>
                        <td class="">

                            <ul class="list-inline list-unstyled">
                                <li>
                                    <a class="btn btn-xs btn-default " data-toggle="modal" data-target="#edit-user-model-{{$user->id}}" type="button"><i class="fa fa-pencil"></i> Edit</a>
                                    {!! view('partials.admin.edit-user', ['thisuser' => $user]) !!}

                                </li>
                                <li>
                                    <a class="btn btn-xs btn-default" type="button" onclick="deleteUser('{{$user->id}}')"><i class="fa fa-times"></i> Delete</a>
                                </li>
                            </ul>


                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js')

    <script>


        function deleteUser(id)
        {
            $.ajax({
                url: '{{url('/admin-api/delete_user')}}/' +id,
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}'
                },
                success: function (results) {
                    $('#client-table-'+id).remove();
                }
            });


        }


    </script>

@endsection