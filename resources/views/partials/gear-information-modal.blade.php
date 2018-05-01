<div class="modal" id="gear-info{{$gear->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">{{$gear->title}}</h3>
                </div>
                <div class="block-content">
                    <img src="{{$gear->picture}}" class="img-responsive">
                    <hr>
                    {!! $gear->description !!}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <a class="btn btn-sm btn-primary" target="_blank" href="{{$gear->link}}" data-dismiss="modal"><i class="fa fa-amazon"></i> View on Amazon</a>
            </div>
        </div>
    </div>
</div>