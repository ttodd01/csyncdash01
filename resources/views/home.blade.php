@extends('layouts.app_dashboard')

@section('content')

@if(Auth::user()->rank == 1)
<div class="container text-center">
<div class="panel panel-default">
<div class="panel-body">
<h1>{{Auth::user()->full_name}}, Thankyou for applying to {{Auth::user()->getHeadCompany->name}}</h1>
<p>You will hear from us within 24 hours.</p>
</div>
</div>
</div>
@endif
@if(Auth::user()->rank == 2)
<div class="container text-center">

<h1>Welcome Back, {{Auth::user()->full_name}}</h1>
<p>Your user ID is {{Auth::user()->id}}.</p>
</div>
<hr/>
<div class="row">
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-body">
<h1>Tools</h1>
    <hr>
    <p>We have a wide range of tools that we can offer our Partners, from Channel Reviews to Recommended Gear. </p>
<a href="{{url('/apps/tools')}}"><button type="button" class="btn btn-block btn-primary">View Tools</button></a>
</div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-body">
<h1>Sponsorships</h1>
    <hr>
    <p>You can view all our sponsorships here, were always looking to get new companies to work with!</p>
<a href="{{url('')}}/apps/sponsorships"><button type="button" class="btn btn-block btn-primary">View Sponsorships</button></a>
</div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-body">
<h1>Payments</h1>
    <hr>
    <p>You can view all your payments below, Please note we do have a Payment Threshold of £25.</p>
<a href="{{url('')}}/user/payments"><button type="button" class="btn btn-block btn-primary">View Payments</button></a>
</div>
</div>
</div>
</div>
@endif
@if(Auth::user()->rank == 4)
<div class="container text-center">

<h1>Welcome Back, {{Auth::user()->full_name}}</h1>
<p>Your user ID is {{Auth::user()->id}}.</p>
</div>

@endif
@endsection
