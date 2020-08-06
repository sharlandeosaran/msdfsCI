<style>.bold {font-weight: bold}</style>

<div class="modal tagsmodal fade" id="tagCommentDetailsModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tag Comment</h4>
            </div>

            <form id="form" method="POST" action="{{route('commenttagpost')}}" role="form">
                @csrf
                <input type="hidden" id="comment_id" name="comment_id" value="{{$comment->id}}">
                <input type="hidden" id="category_id" name="category_id" value="{{$comment->feedback->category_id}}">
                
                <div class="modal-body">
                    <div class="box-body">
                        
                        @foreach ($categories as $cat)
                        @if ($cat->category != 'Other')
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="tags" {{$comment->feedback->category_id == $cat->id? 'disabled' : ''}} name="tags[{{$cat->id}}]" {{in_array($cat->id, $comment->tagsId())? 'checked' : ''}}> <span class="{{$comment->feedback->category_id == $cat->id? 'text-danger bold' : ''}}">{{$cat->category}}</span>
                            </label>
                        </div>
                        @endif
                        @endforeach
                        
                    </div>
                </div>
                                
                <div class="modal-footer">
                    <button type="submit" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>