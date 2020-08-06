@extends('admin.modalapp')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @if(isset($title)) {{ $title }} @endif  | <strong>{{$application->exemption_type}}</strong>
    </h1>
</section>

<section class="content" style="font-size: 15px">

    <div class="row">
        <div class="">
            <section class="content">
                
                <div class="row">
                    <div class="col-md-3">
                        
                        <!-- Profile Image -->
                        <div class="box box-danger my-0">
                            <div class="box-body box-profile text-center">
                                
                                <h3 class="profile-username"><strong>{{$application->travel_party_text}}</strong></h3>
                                
                                
                                {{-- <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <a href="{{url('admin/submissions/pdf/'.$application->id)}}" target="_blank" class="btn btn-block btn-success"><i class="fa fa-file-pdf-o"></i> Export</a>
                                    </li> --}}

                                    {{-- @if (!in_array($application->status_id, [3,6]))
                                    <li class="list-group-item">
                                        <button class="btn btn-block btn-danger"><i class="fa fa-flag"></i> Flag</button>
                                    </li>
                                    @endif

                                </ul> --}}
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        
                        <!-- About Me Box -->
                        <div class="box box-danger">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <strong><i class="fa fa-user margin-r-5"></i> Representative Name</strong>                                
                                <p class="text-muted">
                                    {!!$application->name!!}
                                </p>
                                <hr>

                                <strong><i class="fa fa-phone margin-r-5"></i> Representative Contact</strong>                                
                                <p class="text-muted">
                                    {{$application->contact}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-envelope margin-r-5"></i> Representative Email</strong>                                
                                <p class="text-muted"> <a href="mailto:{{$application->email}}">{{$application->email}}</a></p>
                                <hr>
                                
                                {{-- <strong><i class="fa fa-users margin-r-5"></i> Travel Party</strong>                                
                                <p class="text-muted">{{$application->travel_party_text}}</p>
                                <hr> --}}
                                
                                <strong><i class="fa fa-globe margin-r-5"></i> Country</strong>                                
                                <p class="text-muted">
                                    {{$application->country->country}}
                                                                
                                    @if ($application->country_id == 240 && $application->us_state)
                                         | {{$application->us_state->state}} 
                                    @endif
                                    
                                    @if ($application->country_id == 235 && $application->uk_country)
                                         | {{$application->uk_country->country}} 
                                    @endif

                                    @if ($application->country_id == 37 && $application->canadian_province)
                                         | {{$application->canadian_province->province}} 
                                    @endif
                                    
                                    @if (!in_array($application->country_id, [240, 235, 37]) && $application->city_state)
                                         | {{$application->city_state}} 
                                    @endif
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-calendar margin-r-5"></i> Created</strong>                                
                                <p class="text-muted">{{$application->since}}</p>
                                <hr>
                                
                                <p>
                                    <strong>
                                        <i class="fa fa-plane margin-r-5"></i> Travel Arrangements 
                                        @if ($application->travel_arrangements == 'Y')
                                            <i class="fa fa-check-square fa-lg text-green" style="margin-left: 5px"></i>
                                        @else
                                            <i class="fa fa-window-close fa-lg text-red" style="margin-left: 5px"></i>
                                        @endif
                                    </strong>
                                </p>
                                <hr>
                                
                                @if ($application->quarantine_pay && $application->exemption_type == 'Inbound')
                                <p>
                                    <strong>
                                        <i class="fa fa-hospital margin-r-5"></i> Pay for Quarantine
                                        @if ($application->quarantine_pay == 'Y')
                                            <i class="fa fa-check-square fa-lg text-green" style="margin-left: 5px"></i>
                                        @elseif ($application->quarantine_pay == 'N')
                                            <i class="fa fa-window-close fa-lg text-red" style="margin-left: 5px"></i>
                                        @else
                                            <br>Not Specified<i class="fa fa-window-close fa-lg text-red" style="margin-left: 5px"></i>
                                        @endif
                                    </strong>
                                </p>
                                @endif
                                

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        
                        <!-- feedback audit trail -->
                        {{-- @if (count($application->history))
                            <div class="box box-danger">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <h3>
                                        History <i class="fa fa-history margin-r-5"></i> 
                                        <button class="btn btn-sm btn-danger pull-right" id="viewhistory"><i class="fa fa-eye margin-r-5"></i>view</button>
                                    </h3>

                                    <div id="history" class="" style="display:none">
                                        @foreach ($application->history as $item)
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
                        @endif --}}
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-9">
                        
                        <div class="box box-danger my-0">
                            <div class="box-body box-profile">
                                <h3 class="profile-username" style="padding-bottom: 10px">
                                    <strong>Applicant{{count($application->applicants()) == 1? '' : 's ('.count($application->applicants()).')'}}</strong>
                                    @if (count($application->applicants()) > 1)
                                        <small><button class="btn btn-danger btn-sm pull-right" id="btn_applicant_tabs" style=" top: -5px; position: relative;"><i class="fa fa-eye"></i> show names</button></small>
                                    @endif
                                </h3>
                                
                                <div class="post">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" style="display: none" role="tablist" id="applicant_tabs">
                                        
                                        @foreach ($application->applicants() as $applicant)
                                        <li role="presentation" class="{{$loop->first? 'active' : ''}} applicant_tabs">
                                            <a href="#applicanttab{{$applicant->id}}" aria-controls="applicanttab{{$applicant->id}}" role="tab" data-toggle="tab">
                                                <strong>{{$applicant->name}}</strong>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @foreach ($application->applicants()->sortBy('first_name') as $applicant)
                                        <div role="tabpanel" class="tab-pane {{$loop->first? 'active' : ''}}" id="applicanttab{{$applicant->id}}">

                                            <div class="post">
                                                <div class="user-block">
                                                    
                                                    {{-- <div class="col-md-12" style="padding: 10px 0 15px 0">
                                                        <span class="pull-right text-right">
                                                            
                                                            @if (in_array($applicant->status_id, [1,2]))
                                                                @if ($applicant->status_id == 3)
                                                                    <span class="label label-{{$applicant->status_colour}}">{{$applicant->status}}</span>
                                                                @else
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-{{$applicant->status_colour}}"><strong>{{$applicant->status}}</strong></button>
                                                                        <button type="button" class="btn btn-{{$applicant->status_colour}} dropdown-toggle" data-toggle="dropdown">
                                                                            Action <span class="caret"></span>
                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                        </button>
                                                                        <ul class="dropdown-menu" role="menu">

                                                                            @if (!in_array($applicant->status_id, [2,3]) || ($applicant->assignment()->assigned_by == Auth::user()->id && in_array($applicant->status_id, [2])))
                                                                            <li class="list-group-item">
                                                                                <button class="btn btn-block commentstatus btn-info" comment="{{$applicant->id}}" status="Assigned" statusId="2"><i class="fa fa-user"></i> Assign</button>
                                                                            </li>
                                                                            @endif
                                        
                                                                            @if (in_array($applicant->status_id, [2]) && $applicant->assignment()->assignee == Auth::user()->id)
                                                                            <li class="list-group-item">
                                                                                <button class="btn btn-block commentstatus btn-success" comment="{{$applicant->id}}" status="Completed" statusId="3"><i class="fa fa-check-circle"></i> Complete</button>
                                                                            </li>
                                                                            @endif
                                        
                                                                            @if ((!in_array($applicant->status_id, [3,4,5]) && !$applicant->assignment()) || ($applicant->assignment() && ($applicant->assignment()->assignee == Auth::user()->id || $applicant->assignment()->assigned_by == Auth::user()->id)))
                                                                            <li class="list-group-item">
                                                                                <button class="btn btn-block commentstatus btn-warning" comment="{{$applicant->id}}" status="On Hold" statusId="4"><i class="fa fa-warning"></i> Hold</button>
                                                                            </li>
                                                                            @endif
                                        
                                                                            @if ((!in_array($applicant->status_id, [3,5]) && !$applicant->assignment()) || ($applicant->assignment() && ($applicant->assignment()->assignee == Auth::user()->id || $applicant->assignment()->assigned_by == Auth::user()->id) && !in_array($applicant->status_id, [3,5])))
                                                                            <li class="list-group-item">
                                                                                <button class="btn btn-block commentstatus btn-danger" comment="{{$applicant->id}}" status="Trash" statusId="5"><i class="fa fa-trash"></i> Trash</button>
                                                                            </li>
                                                                            @endif

                                                                        </ul>
                                                                    </div>
                                                                @endif

                                                                @if (isset($applicant->assignee) && $applicant->status_id == 2)
                                                                <br>
                                                                <small><i class="fa fa-user margin-r-5"></i> {{$applicant->assignee}}</small>
                                                                @endif
                                                            @else
                                                                <span class="label label-{{$applicant->status_colour}}">{{$applicant->status}}</span>
                                                            @endif

                                                        </span>
                                                    </div> --}}
                                                    

                                                    {{-- <span class="pull-right" style="margin-right: 5px;" data-toggle="tooltip" title="click to {{$applicant->file_icon == 'fa-file-word-o'? 'download' : 'view'}} document">
                                                        <a href="{{$applicant->file_icon == 'fa-file-word-o'? $applicant->uploadUrl : '#'}}" class="text-red"  @if ($applicant->file_icon !== 'fa-file-word-o') data-toggle="modal" data-target="#exampleModal{{$applicant->id}}" @else target="_blank" @endif>
                                                            <i class="fa {{$applicant->file_icon}} fa-3x" aria-hidden="true"></i><br>
                                                        </a>
                                                    </span> --}}

                                                    {{-- @if ($applicant->file_icon !== 'fa-file-word-o')
                                                        <div class="modal fade" id="exampleModal{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <iframe class="doc" src="{{$applicant->uploadUrl}}"></iframe>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-ptimary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    @endif --}}
                                                    
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-sm">
                                                                <tbody>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Applicant Name
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->name}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Status
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <span class="label label-{{$applicant->status_colour}}" style="font-size: 100%;">{{$applicant->status}}</span>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Gender
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->gender}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Age
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->age}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Passport #
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->passport}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    @if ($applicant->occupation)
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Occupation
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->occupation}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    National Of
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->nationality}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Immigration Status
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->immigration_status}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    COVID-19 Status
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->covid_status}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Medical Issues
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->medical_issues}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    @if ($applicant->medical_issues == 'Yes')
                                                                    <tr>
                                                                        <td class="active text-right align-middle" width="30%">
                                                                            <div class="">
                                                                                <label class="control-label">
                                                                                    Illness/ Condition
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="70%">
                                                                            <label class="control-label"> {{$applicant->illness}} </label>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.user-block -->
                                                
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                
            </section>
        </div>
    </div>
</section>

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

    $(document).on('click', '#btn_applicant_tabs', function() {
        var list = $('#applicant_tabs');
        var btn = $(this);
        if (list.is(":visible")) {
            btn.html('<i class="fa fa-eye"></i> show names');
        } else {
            btn.html('<i class="fa fa-eye-slash"></i> hide names');
        }
        list.toggle('slow');
    });

    // $(document).on('click', '.applicant_tabs', function() {
    //     $('#btn_applicant_tabs').click();
    // });
        
</script>
@endsection