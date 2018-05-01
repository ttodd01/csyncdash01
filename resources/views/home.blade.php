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
<a href=""><button type="button" class="btn btn-block btn-primary">Primary</button></a>
</div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-body">
<h1>Sponsorships</h1>
<a href=""><button type="button" class="btn btn-primary">Primary</button></a>
</div>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-body">
<h1>Revenue</h1>
<a href=""><button type="button" class="btn btn-primary">Primary</button></a>
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
