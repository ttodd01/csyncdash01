@extends('layouts.app_dashboard)

@section('content')

    <div class="panel panel-inverse" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">Network Payments</h4>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Referred Channel</th>
                    <th>Channel Subscribers</th>
                    <th>Network Acceptance</th>
                    <th>Amount Due</th>
                    <th>Payment Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>GloryGamer124</td>
                    <td>500</td>
                    <td><span class="badge badge-danger">Rejected</span></td>
                    <td>$0</td>
                    <td><span class="badge badge-danger">Never</span></td>

                </tr>
                <tr>
                    <td>BeautyQueen22</td>
                    <td>5,000</td>
                    <td><span class="badge badge-success">Accepted</span></td>
                    <td>$25</td>
                    <td><span class="badge badge-warning">March 31st</span></td>
                </tr>
                <tr>
                    <td>Paint4Me</td>
                    <td>500,000</td>
                    <td><span class="badge badge-success">Accepted</span></td>
                    <td>$1250</td>
                    <td><span class="badge badge-warning">March 31st</span></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
    <div class="col-md-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Referral Information</h4>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-success">1</span> Your User ID
                    </a>
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-primary">1</span> Your Network ID
                    </a>
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-success">http://www.dashboard.purity-network.net/Nick</span> Your Refferal Link
                    </a>
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-primary">100</span> Your Total Refferals
                    </a>
                    <a href="#" class="list-group-item text-ellipsis">
                        <span class="badge badge-primary">$200</span> Your Refferal Earnings Earned
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
    <div class="col-md-6">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Referral Video</h4>
            </div>
            <div class="panel-body">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/yUOp36YDYHI" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

@endsection


@section('css')

@endsection

@section('js')

@endsection