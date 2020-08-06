@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('reports')}}">Submission Reports</a></li>
    <li>{{$title}}</li>
    <li class="active">{{$feedback->name}}{{$feedback->organization? ' | '.$feedback->organization : ''}}</li>
</ol>
@endsection

@section('content')
<style>
    .doc {
        width: 100%;
        height: 500px;
    }

    .btn-feedback {
        padding: 3px 5px;
        height: 44px;
        min-width: 50px;
    }
</style>

<section class="content">
    
    @include('common.errors')
        
    <!-- Success alert after new user created -->
    @if(session('success'))
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4><i class="fa fa-check-circle" aria-hidden="true"></i> {{session('success')}}</h4>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <section class="content">
                
                <div class="row">
                    <div class="col-md-3">
                        
                        <!-- Profile Image -->
                        <div class="box box-danger">
                            <div class="box-body box-profile text-center">
                                
                                <h3 class="profile-username">{!!$feedback->name!!}</h3>
                                
                                
                                <ul class="list-group list-group-unbordered">
                                    @if ($feedback->organization)
                                    <li class="list-group-item">
                                        <p class="text-muted">{!!$feedback->organization!!}</p>
                                    </li>
                                    @endif
                                    <li class="list-group-item">
                                        <p class="text-muted">{{$feedback->submissionType}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{url('admin/submissions/pdf/'.$feedback->id)}}" target="_blank" class="btn btn-block btn-success"><i class="fa fa-file-pdf-o"></i> Export</a>
                                    </li>

                                    {{-- @if (!in_array($feedback->status_id, [3,6]))
                                    <li class="list-group-item">
                                        <button class="btn btn-block btn-danger"><i class="fa fa-flag"></i> Flag</button>
                                    </li>
                                    @endif --}}

                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        
                        <!-- About Me Box -->
                        <div class="box box-danger">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                                
                                <p class="text-muted">
                                    {{$feedback->phone}}
                                </p>
                                
                                <hr>
                                
                                <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                                
                                <p class="text-muted"> <a href="mailto:{{$feedback->email}}">{{$feedback->email}}</a></p>
                                
                                <hr>
                                
                                <strong><i class="fa fa-calendar margin-r-5"></i> Created</strong>
                                
                                <p class="text-muted">{{$feedback->since}}</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        
                        <!-- feedback audit trail -->
                        @if (count($feedback->history))
                            <div class="box box-danger">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <h3>
                                        History <i class="fa fa-history margin-r-5"></i> 
                                        <button class="btn btn-sm btn-danger pull-right" id="viewhistory"><i class="fa fa-eye margin-r-5"></i>view</button>
                                    </h3>

                                    <div id="history" class="" style="display:none">
                                        @foreach ($feedback->history as $item)
                                        <hr>
                                        {{$item->oldStatus->status}} <i class="fa fa-arrow-right"></i> {{$item->newStatus->status}} <br>

                                        @if ($item->assignment)
                                        <i class="fa fa-user-plus margin-r-5"></i> {{$item->assignment->assignedTo->name}} <br>
                                        @endif

                                        <br>
                                        <blockquote>
                                            <p class="text-justify">{!!$item->details!!}</p>
                                            <small><cite title="Source Title">
                                                <i class="fa fa-user margin-r-5"></i> {{$item->changedBy->name}}
                                            </cite></small>
                                            <small><cite title="Source Title">
                                                <i class="fa fa-calendar margin-r-5"></i> {{$item->since}}
                                            </cite></small>
                                        </blockquote>
                                        @endforeach
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                        @endif
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-9">
                        
                        <div class="box box-danger">
                            <div class="box-body box-profile">
                                
                                <div class="post">
                                    <div class="user-block">
                                        <span class="username" style="margin-left: 0px;">
                                            <h3 class="pull-left">
                                                Category | {{$feedback->category}} <br>
                                                <small>
                                                    @foreach ($feedback->subcategories() as $sub)
                                                    - {{$sub}} <br>
                                                    @endforeach
                                                </small>
                                            </h3>
                                            
                                            <h3 class="pull-right text-right">
                                                @if ($feedback->status_id == 3)
                                                    <span class="label label-{{$feedback->status_colour}}">{{$feedback->status}}</span>
                                                @else
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-{{$feedback->status_colour}}"><strong>{{$feedback->status}}</strong></button>
                                                        <button type="button" class="btn btn-{{$feedback->status_colour}} dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">

                                                            @if (!in_array($feedback->status_id, [2,3]) || ($feedback->assignment()->assigned_by == Auth::user()->id && in_array($feedback->status_id, [2])))
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block status btn-info" status="Assigned" statusId="2"><i class="fa fa-user"></i> Assign</button>
                                                            </li>
                                                            @endif
                        
                                                            @if (in_array($feedback->status_id, [2]) && $feedback->assignment()->assignee == Auth::user()->id)
                                                                @if (1 == 1)
                                                                    <li class="list-group-item">
                                                                        <button class="btn btn-block status btn-success" status="Completed" statusId="3"><i class="fa fa-check-circle"></i> Complete</button>
                                                                    </li>
                                                                @else
                                                                    <li class="list-group-item">
                                                                        <button class="btn btn-block btn-default"><i class="fa fa-check-circle"></i> Complete</button>
                                                                    </li>
                                                                @endif
                                                            @endif
                        
                                                            @if ((!in_array($feedback->status_id, [3,4,5]) && !$feedback->assignment()) || ($feedback->assignment() && ($feedback->assignment()->assignee == Auth::user()->id || $feedback->assignment()->assigned_by == Auth::user()->id)))
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block status btn-warning" status="On Hold" statusId="4"><i class="fa fa-warning"></i> Hold</button>
                                                            </li>
                                                            @endif
                        
                                                            @if ((!in_array($feedback->status_id, [3,5]) && !$feedback->assignment()) || ($feedback->assignment() && ($feedback->assignment()->assignee == Auth::user()->id || $feedback->assignment()->assigned_by == Auth::user()->id) && !in_array($feedback->status_id, [3,5])))
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block status btn-danger" status="Trash" statusId="5"><i class="fa fa-trash"></i> Trash</button>
                                                            </li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                @endif

                                                @if (isset($feedback->assignee) && $feedback->status_id == 2)
                                                <br>
                                                <small><i class="fa fa-user margin-r-5"></i> {{$feedback->assignee}}</small>
                                                @endif

                                            </h3>
                                        </span>
                                    </div>
                                    
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        
                        
                        @foreach ($feedback->submissions as $comment)
                        <div class="box">
                            <div class="box-body box-profile">

                                <div class="post">
                                    <div class="user-block">
                                        <span class="username pull-left" style="margin-left: 0px;">
                                            <a href="{{url('/admin/comments/view/'.$comment->id)}}" title="click for comment view">Subject | {!!$comment->subject!!}</a>
                                        </span>
                                        
                                        <span class="pull-right text-right">
                                            @if (in_array($feedback->status_id, [1,2]))
                                                @if ($comment->status_id == 3)
                                                    <span class="label label-{{$comment->status_colour}}">{{$comment->status}}</span>
                                                @else
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-{{$comment->status_colour}}"><strong>{{$comment->status}}</strong></button>
                                                        <button type="button" class="btn btn-{{$comment->status_colour}} dropdown-toggle" data-toggle="dropdown">
                                                            Action <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">

                                                            @if (!in_array($comment->status_id, [2,3]) || ($comment->assignment()->assigned_by == Auth::user()->id && in_array($comment->status_id, [2])))
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block commentstatus btn-info" comment="{{$comment->id}}" status="Assigned" statusId="2"><i class="fa fa-user"></i> Assign</button>
                                                            </li>
                                                            @endif
                        
                                                            @if (in_array($comment->status_id, [2]) && $comment->assignment()->assignee == Auth::user()->id)
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block commentstatus btn-success" comment="{{$comment->id}}" status="Completed" statusId="3"><i class="fa fa-check-circle"></i> Complete</button>
                                                            </li>
                                                            @endif
                        
                                                            @if ((!in_array($comment->status_id, [3,4,5]) && !$comment->assignment()) || ($comment->assignment() && ($comment->assignment()->assignee == Auth::user()->id || $comment->assignment()->assigned_by == Auth::user()->id)))
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block commentstatus btn-warning" comment="{{$comment->id}}" status="On Hold" statusId="4"><i class="fa fa-warning"></i> Hold</button>
                                                            </li>
                                                            @endif
                        
                                                            @if ((!in_array($comment->status_id, [3,5]) && !$comment->assignment()) || ($comment->assignment() && ($comment->assignment()->assignee == Auth::user()->id || $comment->assignment()->assigned_by == Auth::user()->id) && !in_array($comment->status_id, [3,5])))
                                                            <li class="list-group-item">
                                                                <button class="btn btn-block commentstatus btn-danger" comment="{{$comment->id}}" status="Trash" statusId="5"><i class="fa fa-trash"></i> Trash</button>
                                                            </li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                @endif

                                                @if (isset($comment->assignee) && $comment->status_id == 2)
                                                <br>
                                                <small><i class="fa fa-user margin-r-5"></i> {{$comment->assignee}}</small>
                                                @endif
                                            @else
                                                <span class="label label-{{$feedback->status_colour}}">{{$feedback->status}}</span>
                                            @endif

                                        </span>

                                        @if ($comment->upload)
                                            <span class="pull-right" style="margin-right: 5px;" data-toggle="tooltip" title="click to {{$comment->file_icon == 'fa-file-word-o'? 'download' : 'view'}} document">
                                                <a href="{{$comment->file_icon == 'fa-file-word-o'? $comment->uploadUrl : '#'}}" class="text-red"  @if ($comment->file_icon !== 'fa-file-word-o') data-toggle="modal" data-target="#exampleModal{{$comment->id}}" @else target="_blank" @endif>
                                                    <i class="fa {{$comment->file_icon}} fa-3x" aria-hidden="true"></i><br>
                                                </a>
                                            </span>

                                            @if ($comment->file_icon !== 'fa-file-word-o')
                                                <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe class="doc" src="{{$comment->uploadUrl}}"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-ptimary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        @include('admin.comments.statusmodal')

                                    </div>
                                    <!-- /.user-block -->
                                    <blockquote>
                                        <p class="text-justify">{!!$comment->comments!!}</p>
                                        <small><cite title="Source Title">{{$comment->created_at}}</cite></small>
                                    </blockquote>
                                    
                                    @foreach ($comment->tags as $sub)
                                    <span class="label label-warning mr-1">{{$sub}}</span>
                                    @endforeach
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        @endforeach
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                
            </section>
        </div>
    </div>
</section>

<div class="modal fade" id="stateDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Status Change Details For Submission</h4>
            </div>
            
            <form method="POST" action="{{ route('updatestatus') }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    
                    <input type="hidden" value="{{$feedback->id}}" name="id">
                    
                    <div class="form-group">
                        <label class="">Intended Status</label>
                        <p class="form-control-static" id="newstatus">New Status</p>
                        <input type="hidden" name="status" id="status">
                    </div>
                    
                    <div class="form-group hide" id="grp-assign">
                        <label for="exampleInputEmail1">Assign To</label>
                        <select class="form-control" id="assign" name="assign">
                            <option value="o" disabled selected>select...</option>
                            @foreach ($users as $user)
                            {{-- @if (!$feedback->assignment() || ($feedback->assignment() && $feedback->assignment()->assignee !== $user->id)) --}}
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
@endsection

@section('scripts')
<script>
    $(document).on('click', '.status', function() {
        $('#stateDetailsModal').modal('show');
        var status = $(this).attr('status');
        var statusId = $(this).attr('statusId');

        $('#newstatus').html(status);
        $('#status').val(statusId);
        // console.log(status);
        // console.log(statusId);

        if (statusId == 2) {
            $('#grp-assign').removeClass('hide');
        }else{
            $('#grp-assign').addClass('hide');
        }
    });

    $(document).on('click', '.commentstatus', function() {
        var comment = $(this).attr('comment');
        $('#stateCommentDetailsModal'+comment).modal('show');
        var status = $(this).attr('status');
        var statusId = $(this).attr('statusId');

        $('#newstatus'+comment).html(status);
        $('#status'+comment).val(statusId);
        // console.log(status);
        // console.log(statusId);

        if (statusId == 2) {
            $('#grp-assign'+comment).removeClass('hide');
        }else{
            $('#grp-assign'+comment).addClass('hide');
        }
    });

    $(document).on('click', '#viewhistory', function() {
        $('#history').toggle('slow', function() { 
            if($("#history").is(":visible")) { 
                $('#viewhistory').html('<i class="fa fa-eye-slash margin-r-5"></i>hide');
            } else { 
                $('#viewhistory').html('<i class="fa fa-eye margin-r-5"></i>view');
            } 
        });
    });
        
</script>
@endsection