@extends('layouts.app_dashboard')


@section('content')
<h1>Channel Earnings Admin</h1>
<hr>
<div class="container" style="padding-top: 10px;">
<div class="col-md-4">
    <div class="panel panel-default text-center" style="padding-top: 10px;">
<h1>{{\App\ChannelEarnings::count()}}</h1>
<p class="text-center">Lifetime Payments Sent</p>
</div>
    </div>
    <div class="col-md-4">
            <div class="panel panel-default text-center" style="padding-top: 10px;">

<h1>$ {{\App\ChannelEarnings::sum('net_amount') }}</h1>
<p class="text-center">Lifetime Earnings Sent</p>
</div>
    </div>
    <div class="col-md-4">
            <div class="panel panel-default text-center" style="padding-top: 10px;">

<h1>{{number_format($this_month_total)}}</h1>
<p class="text-center">Payments Sent In the last 30 Days</p>
</div>
    </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Trigger the modal with a button -->
                <div style="padding-top: 25px; padding-left: 25px;" class="row">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add
                        Channel Earnings
                    </button>

                </div>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Channel Earnings</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['action' => 'EarningsController@addChannelEarnings']) !!}

                                <br>
                                <div class="form-group">
                                    <label>User ID</label>
                                    <input type="text" placeholder="user_id" class="form-control" name="user_id"
                                           id="user_id">
                                </div>
                                <div class="form-group">
                                    <label>Earning Month</label>

                                    <select class="form-control" id="earning_month" name="earning_month" size="1">

                                        <option value="---">---</option>

                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April </option>
                                        <option value="May">May</option>
                                        <option value="June">June </option>
                                        <option value="July">July</option>
                                        <option value="August">August </option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                       
      <div class="form-group">
          <label>Payment Month</label>

          <select class="form-control" id="payment_month" name="payment_month" size="1">

              <option value="---">---</option>

              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April </option>
              <option value="May">May</option>
              <option value="June">June </option>
              <option value="July">July</option>
              <option value="August">August </option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
          </select>
                                </div>
                                <div class="form-group">
                                    <label>gross amount </label>


                                    <input type="text" placeholder="gross_amount" class="form-control" name="gross_amount"
                                           id="gross_amount">
                                </div>
                                  <div class="form-group">
                                                                    <label>net amount </label>


                                                                    <input type="text" placeholder="net_amount" class="form-control" name="net_amount"
                                                                           id="net_amount">
                                                                </div>
                             <div class="form-group">
                                 <label>Payment Status</label>

                                 <select class="form-control" id="status" name="status" size="1">
                                     <option value="---">---</option>
                                     <option value="Pending">Pending</option>
                                     <option value="Sent">Sent</option>
                                     <option value="Didn't Meet Threshold">Didnt Meet Threshold </option>
                                     <option value="Declined">Declined</option>
                                     <option value="Payment Withheld">Payment Withheld</option>
                                     <option value="Awaiting Payment From Third Party">Awaiting Payment From Third Party</option>
                                 </select>
                                </div>




                                <button class="btn btn-info pull-right btn-sm">Add Earnings</button>


                                {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Earning Month</th>
                            <th>Payment Month</th>
                            <th>Amount Earned</th>
                            <th>Status</th>
                            <th>Method</th>
                            <th>Added</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($channels as $channel)

                            <tr>
                                <td>{{$channel->id}}</td>
                                <td>{{$channel->getUser->full_name}}</td>
                                <td>{{$channel->earning_month}}</td>
                                <td>{{$channel->payment_month}}</td>
                                <td>{{$channel->gross_amount}}</td>
                                                                <td>{{$channel->net_amount}}</td>

                                <td>{{$channel->status}}</td>

                                <td>{{$channel->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection