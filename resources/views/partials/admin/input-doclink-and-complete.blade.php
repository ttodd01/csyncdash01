<div class="modal fade" id="review-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open() !!}
            {!! Form::hidden('complete_review', $review->id) !!}
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Add document link</h3>
                </div>
                <div class="block-content">

                    <div class="form-group">

                        <label>Insert Google Document URL <small>Make sure its public!</small></label>
                        <input class="form-control" name="doc_url">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-info" type="submit">Complete</button>
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>