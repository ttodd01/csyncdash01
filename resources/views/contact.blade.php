@extends('layouts.app_dashboard')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>Contact Us - {{Auth::user()->getHeadCompany->name}}</h1>
            <hr>
            <h3>About Us</h3>
            <p>{{Auth::user()->getHeadCompany->network_bio}}</p>
            <hr>
            <h3>Contact Information</h3>
            <p>Telephone Number: {{Auth::user()->getHeadCompany->telephone_number}}</p>
            <p>Email Address: {{Auth::user()->getHeadCompany->email_address}}</p>
            <hr>
            <a target="_blank" href="{{Auth::user()->getHeadCompany->support_url}}"><button type="button" class="btn btn-primary btn-block">Support System</button></a>
        </div>

    </div>
</div>
@endsection


@section('css')

@endsection

@section('js')

@endsection