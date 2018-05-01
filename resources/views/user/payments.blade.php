@extends('layouts.app_dashboard')


@section('content')

 <div style="padding-bottom: 40px; margin-bottom: 40px;"  class="container">
<div class="panel panel-default">
    <div class="panel-body">


                <div class="row text-center">
                    <div class="col-md-4">
                        <h1>
                            {{Auth::user()->channelEarnings()->count()}}
                        </h1>
                        <p>Total Payment(s)</p>
                    </div>
                    <div class="col-md-4">
                        <h1>

                            ${{Auth::user()->channelEarnings()->sum('gross_amount')}}
                        </h1>
                        <p>Total Gross Earnings</p>

                    </div>
                    <div class="col-md-4">
                        <h1>
                            ${{Auth::user()->channelEarnings()->sum('net_amount')}}
                        </h1>
                        <p>Net Earnings</p>

                    </div>

                </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="channel" role="tabpanel">
                <h2>Channel Earnings</h2>
                <p>View your Daily Motion Channel Earnings Here</p>
                <hr>
                    <table class="table table-bordered m-0">

                        <thead>
                        <tr>
                            <th>Earning Month</th>
                            <th>Payment Month</th>
                            <th>Gross Amount</th>
                                                        <th>Net Amount</th>

                            <th>Status</th>
                            <th>Added</th>
                        </tr>
                        </thead>

                        @foreach(Auth::user()->channelEarnings as $earning )


                            <tbody>
                            <tr>
                                <td>{{$earning->earning_month}}</td>
                                <td>{{$earning->payment_month}}</td>
                                <td>$ {{$earning->gross_amount}}</td>
                                                                <td>$ {{$earning->net_amount}}</td>

                                <td><span class="label label-success">{{$earning->status}}</span>
                                </td>
                                <td>{{$earning->created_at->diffForHumans()}}</td>

                            </tr>



                        @endforeach
                    </table>

            </div>



        </div>

    </div>
</div>


    </div>
    <div class="container" style="padding-bottom: 40px; margin-bottom: 40px;" >
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>{{Auth::user()->full_name}}</h1>
                <hr>
                <table class="table table-bordered m-0">

                    <thead>
                    <tr>
                        <th>Revenue Share</th>
                        <th>Joined Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{Auth::user()->rev_share}}%</td>
                        <td>{{Auth::user()->created_at->diffForHumans()}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection