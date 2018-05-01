@extends('layouts.app_dashboard')

@section('content')

    <div class="tab-content">
        <div class="tab-pane fade active in">


            <form action="{{route('network.settings')}}" method="post">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="col-md-6">


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="margin-top: 5px; float: right;">
                                            <strong>
                                                Network Name
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="name" value="{{$account->getNetwork()->name}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="margin-top: 5px; float: right;">
                                            <strong>
                                                Network Slogan
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="slogan" value="{{$account->getNetwork()->slogan}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="margin-top: 5px; float: right;">
                                            <strong>
                                                Network Logo
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="logo_url" value="{{$account->getNetwork()->background_image_url}}" required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="margin-top: 5px; float: right;">
                                            <strong>
                                                Network Color Scheme
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="color-scheme">
                                            <option value="1">Default</option>
                                            <option value="2">Red</option>
                                            <option value="3">Blue</option>
                                            <option value="4">Purple</option>
                                            <option value="5">Orange</option>
                                            <option value="6">Black</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="margin-top: 5px; float: right;">
                                            <strong>
                                                Network Bio
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="bio" required>{{$account->getNetwork()->network_bio}}</textarea>
                                    </div>
                                </div>
                            </div>



                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="margin-top: 5px; float: right;">
                                        <strong>
                                            Twitter URL
                                        </strong>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="twitter" value="{{$account->getNetwork()->twitter}}" placeholder="http://twitter.com/puritynetwork" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="margin-top: 5px; float: right;">
                                        <strong>
                                            Facebook URL
                                        </strong>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="facebook" value="{{$account->getNetwork()->facebook}}" placeholder="https://www.facebook.com/PurityNetwork">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="margin-top: 5px; float: right;">
                                        <strong>
                                            Youtube URL
                                        </strong>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="youtube" value="{{$account->getNetwork()->youtube}}" placeholder="https://www.youtube.com/user/PurityNetworkMCN">
                                    <small>Either your username or channel id</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="margin-top: 5px; float: right;">
                                        <strong>
                                            Instagram URL
                                        </strong>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="instagram" value="{{$account->getNetwork()->instagram}}" placeholder="http://instagram.com/puritynetwork">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="margin-top: 5px; float: right;">
                                        <strong>
                                            LinkedIn URL
                                        </strong>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="linkedin" value="{{$account->getNetwork()->linkedin}}" placeholder="https://www.linkedin.com/company/purity-network?trk=mini-profile">
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

                <div class="panel-footer">
                    <div class="form-group">

                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save Settings</button>

                    </div>
                </div>
            </form>





        </div>
    </div>

@endsection


@section('css')

@endsection

@section('js')

@endsection