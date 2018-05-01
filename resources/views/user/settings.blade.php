@extends('layouts.app_dashboard')

@section('content')

      <div class="panel panel-default">
          <div class="panel-body">
              <div class="tab-pane fade active in" id="default-tab-1">
                  <h3 class="m-t-10"><i class="fa fa-user"></i> Edit Your Profile Settings!</h3>

                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <div class="profile-left">
                      <!-- begin profile-image -->
                      <div class="profile-image">
                          <img src=""/>
                          <i class="fa fa-user hide"></i>
                      </div>

                  </div>
                  <!-- end profile-left -->
                  <!-- begin profile-right -->
                  <div class="profile-right">
                      <!-- begin profile-info -->
                      <div class="profile-info">
                          <!-- begin table -->
                          <div class="table-responsive">
                              {!! Form::open() !!}

                              <table class="table table-profile">
                                  <thead>
                                  <tr>
                                      <th></th>
                                      <th>
                                          <h4>{{ Auth::user()->full_name }}
                                          </h4>
                                      </th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr class="highlight">
                                      <td class="field">Account Type</td>
                                      <td><span class="badge badge-info">{{Auth::user()->getRank()->name}}</span></td>
                                  </tr>
                                  <tr class="divider">
                                      <td colspan="2"></td>
                                  </tr>
                                  <tr>
                                      <td class="field">Full Name:</td>
                                      <td><input type="text" name="full_name" class="form-control input-xs input-inline" value="{{Auth::user()->full_name}}" width="300" /></td>
                                  </tr>
                                  <tr>
                                      <td class="field">Username:</td>
                                      <td><input type="text" name="username" class="form-control input-xs input-inline" value="{{Auth::user()->username}}" width="300" /></td>
                                  </tr>
                                  <tr>
                                      <td class="field">Email Address:</td>
                                      <td><input type="email" name="email" class="form-control input-xs input-inline" value="{{Auth::user()->email}}" width="300" /></td>
                                  </tr>
                                  <tr>
                                      <td class="field">PayPal Email:</td>
                                      <td><input type="email" name="paypal_email" class="form-control input-xs input-inline" value="{{Auth::user()->paypal_email}}" width="300" /></td>
                                  </tr>
                                  <tr>
                                      <td class="field">Phone Number:</td>
                                      <td><input type="text" name="phone_number" class="form-control input-xs input-inline" id="masked-input-phone" placeholder="(999) 999-9999" value="{{Auth::user()->phone_number}}"></td>
                                  </tr>


                                  <tr class="">
                                      <td class="field">Address</td>
                                      <td><textarea name="address" type="text" class="form-control" placeholder="Your address">{{Auth::user()->address}}</textarea></td>
                                  </tr>

                                  <tr class="divider">
                                      <td colspan="2"></td>
                                  </tr>
                                  <tr class="highlight">
                                      <td class="field">About Me</td>
                                      <td><textarea name="bio" type="text" class="form-control" placeholder="Tell us about yourself">{{Auth::user()->bio}}</textarea></td>
                                  </tr>
                                  <tr class="divider">
                                      <td colspan="2"></td>
                                  </tr>
                                  <tr>
                                      <td class="field">Country/Region</td>
                                      <td>


                                          {!! Form::select('country', getCountries(), Auth::user()->country, ['class' => 'form-control input-xs input-inline', 'placeholder' => 'Pick your country']) !!}

                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="field">Gender</td>
                                      <td>
                                          {!! Form::select('gender', ['1' => 'Male', '2' => 'Female'], Auth::user()->gender, ['class' => 'form-control input-xs input-inline', 'placeholder' => 'Pick your Gender']) !!}
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="field">Birthdate</td>
                                      <td>
                                          {!! Form::selectRange('birth_day', 0, 31, Auth::user()->birth_day, ['class' => 'form-control input-xs input-inline']) !!}
                                          -
                                          {!! Form::selectMonth('birth_month', Auth::user()->birth_month, ['class' => 'form-control input-xs input-inline']) !!}
                                          -
                                          {!! Form::selectRange('birth_year', 1900, 2000, Auth::user()->birth_year, ['class' => 'form-control input-xs input-inline']) !!}
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                  </tbody>

                              </table>
                              {!! Form::close() !!}
                          </div>

                          <!-- end table -->
                      </div>
                      <!-- end profile-info -->
                  </div>
                  <!-- end profile-right -->
              </div>
          </div>
      </div>



@endsection


@section('js')
<script src="{{asset('assets/plugins/masked-input/masked-input.min.js')}}"></script>
<script>
    $("#masked-input-phone").mask("(999) 999-9999");
</script>
@endsection