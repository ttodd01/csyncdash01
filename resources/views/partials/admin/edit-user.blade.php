<div class="modal fade" id="edit-user-model-{{$thisuser->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open() !!}
            {!! Form::hidden('edit_user', $thisuser->id) !!}
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Edit {{$thisuser->name}}</h3>
                </div>
                <div class="block-content">

                    <div class="form-group">

                        <div class="form-group">
                            <label>User's Name</label>
                            <input type="text" class="form-control" name="name" value="{{$thisuser->name}}">
                        </div>
                        <div class="form-group">
                            <label>User's Email</label>
                            <input type="email" class="form-control" name="email" value="{{$thisuser->email}}">
                        </div>

                        <div class="form-group">
                            <label>User is Admin?</label>
                            <br>
                            <input type="checkbox" name="is_admin" value="1" @if($thisuser->is_admin == 1) checked @endif>
                        </div>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Ok</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>