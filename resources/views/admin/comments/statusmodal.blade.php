<div class="modal fade" id="stateCommentDetailsModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Status Change Details For Submission</h4>
            </div>
            
            <form method="POST" action="{{ route('updatecommentstatus') }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    
                    <input type="hidden" value="{{$comment->id}}" name="id">
                    
                    <div class="form-group">
                        <label class="">Intended Status</label>
                        <p class="form-control-static" id="newstatus{{$comment->id}}">New Status</p>
                        <input type="hidden" name="status" id="status{{$comment->id}}">
                    </div>
                    
                    <div class="form-group hide" id="grp-assign{{$comment->id}}">
                        <label for="exampleInputEmail1">Assign To</label>
                        <select class="form-control" id="assign" name="assign">
                            <option value="o" disabled selected>select...</option>
                            @foreach ($users as $user)
                            {{-- @if (!$comment->assignment() || ($comment->assignment() && $comment->assignment()->assignee !== $user->id)) --}}
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            {{-- @endif --}}
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Details</label>
                        <textarea class="form-control" rows="3" name="details" id="details" maxlength="1000"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>