@extends('admin.modalapp')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/lefttabs.css') }}">
<!-- Lightbox -->
<link rel="stylesheet" href="{{ asset('css/admin/lightbox/ekko-lightbox.css') }}">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Application Region | <strong>{{$application->applicant->region}}</strong>

        <span class="pull-right">
            <a class="btn btn-success btn-sm" href="{{url('/admin/applications/pdf/'.$application->id)}}" target="_blank"><i class="fas fa-file-pdf fa-lg"></i> export</a>

            @if (in_array($application->status_id, \Auth::user()->role_permissions) && $application->status()->restore_id != 0)
                <button class="btn btn-danger btn-sm status" status="{{$application->status()->restore}}" statusId="{{$application->status()->restore_id}}"><i class="fas fa-undo fa-lg"></i> {{$application->status()->restore}}</button>
            @endif
            
            @foreach ($status as $stat)
                @if (
                    in_array($stat->id, \Auth::user()->role_permissions) && 
                    $stat->id > $application->status_id && 
                    (
                        ($stat->id == $application->status_id + 1 && $application->status_id != 10) || 
                        ($stat->id == $application->status_id + 3 && $application->status_id == 8) ||
                        ($stat->id == $application->status_id + 2 && $application->status_id == 1)
                    )
                )
                    <button class="btn btn-danger btn-sm status" status="{{$stat->status}}" statusId="{{$stat->id}}">{{-- <i class="fas fa-arrow-right fa-lg"></i>  --}}{{$stat->button}}</button>
                @endif
                
            @endforeach
            

            <form method="POST" action="#" id="approvalrequestForm">
                @csrf
                <input type="hidden" value="{{$application->id}}" name="id">
                <input type="hidden" value="" name="status_id" id="approvalrequestStatusID">
                <input type="hidden" value="" name="status" id="approvalrequestStatus">

            </form>
        </span>
    </h1>
</section>

<section class="content" style="font-size: 15px">
    
    <div class="box box-danger my-0">
        <div class="box-body box-profile">
            @include('common.errors')
            
            {{-- tabs --}}
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 bhoechie-tab-menu text-center">
                <div class="list-group">

                    <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon"><i class="fas fa-file-alt fa-lg"></i></h4><br/>Application Details
                    </a>

                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon"><i class="fas fa-home fa-lg"></i></h4><br/>Household
                    </a>

                    @if ($application->household->housing_type_id == 4 && $application->household->landlord)
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon"><i class="fas fa-user fa-lg"></i></h4><br/>Landlord Details
                    </a>
                    @endif

                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon"><i class="fas fa-exclamation-triangle fa-lg"></i></h4><br/>Disaster Details
                    </a>

                    @if (count($application->water_marks) + count($application->structural_damage) + count($application->electrical_damage) + count($application->plumbing_damage))
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon"><i class="fas fa-images fa-lg"></i></h4><br/>Photos
                    </a>
                    @endif

                    @if (count($application->fire_service_report_documents) + count($application->regional_corporation_flooding_report_documents) + count($application->clothing_relief_quotation_documents) + count($application->housing_relief_quotation_documents) + count($application->school_supplies_relief_quotation_documents))
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon"><i class="fas fa-file-pdf fa-lg"></i></h4><br/>Documents
                    </a>
                    @endif
                    
                    @if (count($application->history))
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon"><i class="fas fa-history fa-lg"></i></h4><br/>History
                    </a>
                    @endif
                    
                </div>
            </div>

            {{-- tab content --}}
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 bhoechie-tab">
                
                {{-- application details --}}
                <div class="bhoechie-tab-content active">
                    <!-- Profile Image -->
                    <div class="my-0">
                        <div class="box-body box-profile text-center">
                            
                            <h3 class="profile-username"><strong>{{$application->form_type}}</strong></h3>
                            
                            
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

                            <div class="row">
                                <ol class="show-grid col-md-12">
                                      <li class="col-sm-3 steps {{$application->status()->step >= 1? 'active' : 'inactive'}}">
                                       <div class="media">
                                          <div class="pull-left" href="#">
                                            <span class="glyphicon steps"><i class="fas fa-inbox fa-lg"></i></span>
                                          </div>
                                        <div class="media-body">
                                            <strong>{{$application->status()->step >= 1? 'Recieved' : 'Pending Receipt'}}</strong><br>
                                            {{$application->step(1)}}
                                        </div>
                                    </div>
                                      </li>
                                      <li class="col-sm-3 steps {{$application->status()->step >= 2? 'active' : 'inactive'}}">
                                      <div class="media">
                                          <div class="pull-left" href="#">
                                            <span class="glyphicon steps"><i class="fas fa-eye fa-lg"></i></span>
                                          </div>
                                        <div class="media-body">
                                            <strong>{{$application->status()->step >= 2? 'Assessed' : 'Pending Assessment'}}</strong><br>
                                            {{$application->step(2)}}
                                        </div>
                                    </div>
                                      </li>
                                      <li class="col-sm-3 steps {{$application->status()->step >= 3? 'active' : 'inactive'}}">
                                       <div class="media">
                                          <div class="pull-left" href="#">
                                            <span class="glyphicon steps"><i class="fas fa-hourglass-start fa-lg"></i></span>
                                          </div>
                                        <div class="media-body">
                                            <strong>Pending Approval</strong><br>
                                            {{$application->step(3)}}
                                        </div>
                                    </div>
                                      </li>
                                      <li class="col-sm-3 steps {{$application->status()->step >= 4? 'active' : 'inactive'}}">
                                       <div class="media">
                                          <div class="pull-left" href="#">
                                            <span class="glyphicon steps"><i class="fas fa-{{$application->status_id == 11? 'thumbs-down' : 'thumbs-up'}} fa-lg"></i></span>
                                          </div>
                                        <div class="media-body">
                                            <strong>{{$application->status()->step == 4? ($application->status_id == 11? 'Rejected' : 'Approved') : 'Approval/ Rejection'}}</strong><br>
                                            {{$application->step(4)}}
                                        </div>
                                    </div>
                                      </li>
                                </ol>
                            </div>

                            <p><strong><i class="fa fa-hashtag margin-r-5"></i> Ref Number | {{$application->reference_number}}</strong></p>
                            <hr>

                            <p><strong><i class="fa fa-hashtag margin-r-5"></i> Applicant Name | {{$application->applicant->name}}</strong></p>
                            <hr>

                            <p>
                                <strong>
                                    <i class="fa fa-info-circle margin-r-5"></i> Status | 
                                    <span class="label label-{{$application->status_colour}}" style="font-size: 100%;">{{$application->status}}</span>
                                </strong>
                            </p>
                            <hr>

                            @if (count($application->schedules))
                                <strong><i class="fa fa-clipboard-check margin-r-5"></i> Schedules</strong>
                                <p>
                                    @foreach ($application->schedules as $schedule)
                                        <a class="btn btn-success btn-sm" href="{{url('/admin/schedule/view/'.$schedule->id)}}" target="_blank">{{$schedule->type}} &nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a><br>
                                    @endforeach
                                </p>
                                <hr>
                            @endif

                            <p><strong><i class="fa fa-envelope margin-r-5"></i> Email | <a href="mailto:{{$application->applicant->email}}">{{$application->applicant->email}}</a></strong></p>
                            <hr>

                            @if ($application->household)
                            
                                <strong><i class="fa fa-home margin-r-5"></i> Address</strong>                                
                                <p class="text-muted">
                                    {!! $application->household->address !!}
                                </p>
                                <hr>
                                
                                @if ($application->household->housing_type)
                                <strong><i class="fa fa-home margin-r-5"></i> Household Type</strong>                                
                                <p class="text-muted">
                                    {{$application->household->housing_type->type}} Household of {{count($application->household_people) == 1? '1 Person' : count($application->household_people).' People'}}

                                    @if ($application->household->housing_type_id == 4)
                                        <br>{{$application->household->landlord->rental_amount}} Rent
                                    @endif

                                    @if ($application->household->children_count)
                                        <br>{{$application->household->children_count == 1? $application->household->children_count .' Child' : $application->household->children_count .' Children'}} 
                                    @endif
                                     
                                    @if ($application->household->primary_student_count)
                                        <br>{{$application->household->primary_student_count}} Primary School Student{{$application->household->primary_student_count == 1? '' : 's'}}
                                    @endif
                                    
                                    @if ($application->household->secondary_student_count)
                                        <br>{{$application->household->secondary_student_count}} Secondary School Student{{$application->household->secondary_student_count == 1? '' : 's'}}
                                    @endif
                                </p>
                                <hr>
                                @endif
                                
                                @if ($application->household->total_income)
                                <strong><i class="fa fa-dollar margin-r-5"></i> Total Household Income</strong>                                
                                <p class="text-muted">
                                    {{$application->household->total_income->income}}
                                </p>
                                <hr>
                                @endif
                            
                            @endif
                            
                            <strong><i class="fa fa-calendar margin-r-5"></i> Created</strong>                                
                            <p class="text-muted">{{$application->since}}</p>
                            {{-- <hr> --}}
                            

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                
                {{-- household --}}
                <div class="bhoechie-tab-content">
                    <div class="my-0">
                        <div class="box-body box-profile text-center" style="padding-bottom: 5px;">
                            
                            <h3 class="profile-username">
                                <strong>{{$application->household->housing_type->type}} Household{{count($application->household_people) == 1? '' : ' ('.count($application->household_people).')'}}</strong>
                                @if (count($application->household_people) > 1)
                                    <small><button class="btn btn-danger btn-sm pull-right" id="btn_applicant_tabs" style="font-size: 10px;"><i class="fa fa-eye-slash"></i> hide names</button></small>
                                @endif
                            </h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    
                    <div class="box box-danger my-0">
                        <div class="box-body box-profile">
                            
                            <div class="post">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" style="/* display: none */" role="tablist" id="applicant_tabs">

                                    <li role="presentation" class="active applicant_tabs">
                                        <a href="#applicanttab{{$application->applicant->person_id}}" aria-controls="applicanttab{{$application->applicant->person_id}}" role="tab" data-toggle="tab">
                                            <strong>{{$application->applicant->name}} <span style="color: red;">*</span> </strong>
                                        </a>
                                    </li>

                                    @foreach ($application->household_people as $applicant)
                                        @if ($applicant->person->id != $application->applicant->person_id)
                                            <li role="presentation" class="applicant_tabs">
                                                <a href="#applicanttab{{$applicant->person->id}}" aria-controls="applicanttab{{$applicant->person->id}}" role="tab" data-toggle="tab">
                                                    <strong>{{$applicant->person->name}}</strong>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @foreach ($application->household_people as $applicant)
                                    <div role="tabpanel" class="tab-pane {{$applicant->person->id == $application->applicant->person_id? 'active' : ''}}" id="applicanttab{{$applicant->person->id}}">

                                        <div class="post">
                                            <div class="user-block">
                                                
                                                {{-- <div class="col-md-12" style="padding: 10px 0 15px 0">
                                                    <span class="pull-right text-right">
                                                        
                                                        @if (in_array($applicant->person->status_id, [1,2]))
                                                            @if ($applicant->person->status_id == 3)
                                                                <span class="label label-{{$applicant->person->status_colour}}">{{$applicant->person->status}}</span>
                                                            @else
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-{{$applicant->person->status_colour}}"><strong>{{$applicant->person->status}}</strong></button>
                                                                    <button type="button" class="btn btn-{{$applicant->person->status_colour}} dropdown-toggle" data-toggle="dropdown">
                                                                        Action <span class="caret"></span>
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                    </button>
                                                                    <ul class="dropdown-menu" role="menu">

                                                                        @if (!in_array($applicant->person->status_id, [2,3]) || ($applicant->person->assignment()->assigned_by == Auth::user()->id && in_array($applicant->person->status_id, [2])))
                                                                        <li class="list-group-item">
                                                                            <button class="btn btn-block commentstatus btn-info" comment="{{$applicant->person->id}}" status="Assigned" statusId="2"><i class="fa fa-user"></i> Assign</button>
                                                                        </li>
                                                                        @endif
                                    
                                                                        @if (in_array($applicant->person->status_id, [2]) && $applicant->person->assignment()->assignee == Auth::user()->id)
                                                                        <li class="list-group-item">
                                                                            <button class="btn btn-block commentstatus btn-success" comment="{{$applicant->person->id}}" status="Completed" statusId="3"><i class="fa fa-check-circle"></i> Complete</button>
                                                                        </li>
                                                                        @endif
                                    
                                                                        @if ((!in_array($applicant->person->status_id, [3,4,5]) && !$applicant->person->assignment()) || ($applicant->person->assignment() && ($applicant->person->assignment()->assignee == Auth::user()->id || $applicant->person->assignment()->assigned_by == Auth::user()->id)))
                                                                        <li class="list-group-item">
                                                                            <button class="btn btn-block commentstatus btn-warning" comment="{{$applicant->person->id}}" status="On Hold" statusId="4"><i class="fa fa-warning"></i> Hold</button>
                                                                        </li>
                                                                        @endif
                                    
                                                                        @if ((!in_array($applicant->person->status_id, [3,5]) && !$applicant->person->assignment()) || ($applicant->person->assignment() && ($applicant->person->assignment()->assignee == Auth::user()->id || $applicant->person->assignment()->assigned_by == Auth::user()->id) && !in_array($applicant->person->status_id, [3,5])))
                                                                        <li class="list-group-item">
                                                                            <button class="btn btn-block commentstatus btn-danger" comment="{{$applicant->person->id}}" status="Trash" statusId="5"><i class="fa fa-trash"></i> Trash</button>
                                                                        </li>
                                                                        @endif

                                                                    </ul>
                                                                </div>
                                                            @endif

                                                            @if (isset($applicant->person->assignee) && $applicant->person->status_id == 2)
                                                            <br>
                                                            <small><i class="fa fa-user margin-r-5"></i> {{$applicant->person->assignee}}</small>
                                                            @endif
                                                        @else
                                                            <span class="label label-{{$applicant->person->status_colour}}">{{$applicant->person->status}}</span>
                                                        @endif

                                                    </span>
                                                </div> --}}
                                                

                                                {{-- <span class="pull-right" style="margin-right: 5px;" data-toggle="tooltip" title="click to {{$applicant->person->file_icon == 'fa-file-word-o'? 'download' : 'view'}} document">
                                                    <a href="{{$applicant->person->file_icon == 'fa-file-word-o'? $applicant->person->uploadUrl : '#'}}" class="text-red"  @if ($applicant->person->file_icon !== 'fa-file-word-o') data-toggle="modal" data-target="#exampleModal{{$applicant->person->id}}" @else target="_blank" @endif>
                                                        <i class="fa {{$applicant->person->file_icon}} fa-3x" aria-hidden="true"></i><br>
                                                    </a>
                                                </span> --}}

                                                {{-- @if ($applicant->person->file_icon !== 'fa-file-word-o')
                                                    <div class="modal fade" id="exampleModal{{$applicant->person->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe class="doc" src="{{$applicant->person->uploadUrl}}"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-ptimary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                @endif --}}
                                                
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Name
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->name}} </label>
                                                                </td>
                                                            </tr>
                                                            
                                                            @if ($applicant->person->othername)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Other Names
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->othername}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->relationship)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Relationship to Applicant
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->relationship->relationship}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif

                                                            @if (count($application->applicant_documents) && $applicant->person->id == $application->applicant->person_id)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Documents
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <p class="text-muted">
                                                                        @foreach ($application->applicant_documents as $doc)
                                                                        <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                                                        @endforeach
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->marital_status_id)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Marital Status
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->marital_status}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Gender
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->gender}} </label>
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
                                                                    <label class="control-label"> {{$applicant->person->age}} </label>
                                                                </td>
                                                            </tr>
                                                            
                                                            @if ($applicant->person->national_id)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            National ID
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> 
                                                                        {{$applicant->person->national_id}}
                                                                        @if ($applicant->person->national_id_state)
                                                                            <br>{{$applicant->person->national_id_state}}
                                                                        @endif
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->passport)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Passport #
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->passport}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->drivers_permit)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Driver's Permit
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->drivers_permit}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->employment_status)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Employment Status
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->employment_status}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->primary_mobile_contact)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Primary Mobile Contact
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->primary_mobile_contact}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->secondary_mobile_contact)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Secondary Mobile Contact
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->secondary_mobile_contact}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                            @if ($applicant->person->land_line_telephone_contact)
                                                            <tr>
                                                                <td class="active text-right align-middle" width="30%">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            Land Line Telephone Contact
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td width="70%">
                                                                    <label class="control-label"> {{$applicant->person->land_line_telephone_contact}} </label>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            
                                                        </tbody>
                                                    </table>
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
                
                {{-- landlord --}}
                @if ($application->household->housing_type_id == 4 && $application->household->landlord)
                    <div class="bhoechie-tab-content">
                        <!-- Profile Image -->
                        <div class="my-0">
                            <div class="box-body box-profile text-center">
                                
                                <h3 class="profile-username"><strong>Landlord Details</strong></h3>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        
                        <!-- About Me Box -->
                        <div class="box box-danger">
                            <!-- /.box-header -->
                            <div class="box-body">
                                
                                <strong><i class="fa fa-user margin-r-5"></i> Name</strong>                                
                                <p class="text-muted">
                                    {{$application->household->landlord->name}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>                                
                                <p class="text-muted">
                                    {{$application->household->landlord->contact}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-dollar margin-r-5"></i> Rental Amount</strong>                                
                                <p class="text-muted">
                                    {{$application->household->landlord->rental_amount}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-file-alt margin-r-5"></i> Documents</strong>                                
                                <p class="text-muted">
                                    @foreach ($application->landlord_documents as $doc)
                                    <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    @endforeach
                                </p>
                                <hr>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                @endif

                {{-- disaster details --}}
                <div class="bhoechie-tab-content">
                    <!-- Profile Image -->
                    <div class="my-0">
                        <div class="box-body box-profile text-center">
                            
                            <h3 class="profile-username"><strong>Disaster Details</strong></h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    
                    <!-- About Me Box -->
                    <div class="box box-danger">
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if ($application->form_critical_incident())
                                    
                                <strong><i class="fa fa-medkit margin-r-5"></i> Disaster</strong>                                
                                <p class="text-muted">
                                    {{$application->form_critical_incident()->disaster}}
                                </p>
                                <hr>
                                    
                                @if ($application->form_critical_incident()->items_lost)
                                    <strong><i class="fa fa-couch margin-r-5"></i> Items Lost or Damaged</strong>                                
                                    <h4>
                                        @foreach ($application->form_critical_incident()->items_lost as $item)
                                            <span class="label label-default label-list">{{$item->item}}</span>
                                        @endforeach
                                    </h4>
                                    <hr>
                                @endif
                                    
                                @if ($application->form_critical_incident()->housing_damage)
                                    <p>
                                        <strong>
                                            <i class="fa fa-dollar margin-r-5"></i> Housing Infrastructure Damage | 
                                            @if ($application->form_critical_incident()->housing_damage == 'Y')
                                                <i class="fa fa-check-square text-green fa-lg" style="margin-left: 5px"></i>
                                            @else
                                                <i class="fa fa-window-close text-red fa-lg" style="margin-left: 5px"></i>
                                            @endif
                                        </strong>
                                    </p>
                                    <hr>
                                        
                                    @if ($application->form_critical_incident()->housing_damage == 'Y')

                                        @if ($application->form_critical_incident()->housing_repairs)
                                        <strong><i class="fa fa-wrench margin-r-5"></i> Housing Repairs Required </strong>                                
                                        <p class="text-muted">
                                            {{$application->form_critical_incident()->housing_repairs}}
                                        </p>
                                        <hr>
                                        @endif

                                        @if ($application->form_critical_incident()->insurer() || $application->form_critical_incident()->insured)
                                            @if ($application->form_critical_incident()->insurer())
                                                <strong><i class="fa fa-building margin-r-5"></i> Insurance</strong>                                
                                                <p class="text-muted">
                                                    <blockquote>
                                                        <strong>{{$application->form_critical_incident()->insurer()->insurer_name}}</strong> <br>
                                                        <i>{{$application->form_critical_incident()->insurer()->insurer_address}}</i> <br>
                                                        <footer>{{$application->form_critical_incident()->insurer()->insurer_contact}}</footer>
                                                    </blockquote>
                                                </p>
                                                <hr>
                                            @endif
                                        @endif
                                    @endif

                                @endif

                            @endif

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                {{-- Photos --}}
                @if (count($application->water_marks) + count($application->structural_damage) + count($application->electrical_damage) + count($application->plumbing_damage))
                <div class="bhoechie-tab-content">
                    <!-- Profile Image -->
                    <div class="my-0">
                        <div class="box-body box-profile text-center">
                            
                            <h3 class="profile-username"><strong>Uploaded Photos</strong></h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-danger">
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            @if (count($application->site_evidence))
                                <p>
                                    <strong><i class="far fa-images margin-r-5"></i> ** Site Evidence **</strong>
                                </p>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="">
                                            @foreach ($application->site_evidence as $doc)
                                            <div class="col-sm-1" style="padding: 5px;">
                                                <a href="{{$doc->document_url}}" data-toggle="lightbox" data-gallery="site_evidence">
                                                    <img src="{{$doc->document_url}}" class="img-fluid img-thumbnail">
                                                </a>
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            
                            @if (count($application->water_marks))
                                <p>
                                    <strong><i class="far fa-images margin-r-5"></i> Water Marks</strong>
                                </p>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="">
                                            @foreach ($application->water_marks as $doc)
                                            <div class="col-sm-1" style="padding: 5px;">
                                                <a href="{{$doc->document_url}}" data-toggle="lightbox" data-gallery="water_marks">
                                                    <img src="{{$doc->document_url}}" class="img-fluid img-thumbnail">
                                                </a>
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            
                            @if (count($application->structural_damage))
                                <p>
                                    <strong><i class="far fa-images margin-r-5"></i> Structural Damage</strong>
                                </p>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="">
                                            @foreach ($application->structural_damage as $doc)
                                            <div class="col-sm-1" style="padding: 5px;">
                                                <a href="{{$doc->document_url}}" data-toggle="lightbox" data-gallery="structural_damage">
                                                    <img src="{{$doc->document_url}}" class="img-fluid img-thumbnail">
                                                </a>
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            
                            @if (count($application->electrical_damage))
                                <p>
                                    <strong><i class="far fa-images margin-r-5"></i> Electrical Damage</strong>
                                </p>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="">
                                            @foreach ($application->electrical_damage as $doc)
                                            <div class="col-sm-1" style="padding: 5px;">
                                                <a href="{{$doc->document_url}}" data-toggle="lightbox" data-gallery="electrical_damage">
                                                    <img src="{{$doc->document_url}}" class="img-fluid img-thumbnail">
                                                </a>
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            
                            @if (count($application->plumbing_damage))
                                <p>
                                    <strong><i class="far fa-images margin-r-5"></i> Plumbing Damage</strong>
                                </p>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="">
                                            @foreach ($application->plumbing_damage as $doc)
                                            <div class="col-sm-1" style="padding: 5px;">
                                                <a href="{{$doc->document_url}}" data-toggle="lightbox" data-gallery="plumbing_damage">
                                                    <img src="{{$doc->document_url}}" class="img-fluid img-thumbnail">
                                                </a>
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                {{-- Documents --}}
                @if (count($application->fire_service_report_documents) + count($application->regional_corporation_flooding_report_documents) + count($application->clothing_relief_quotation_documents) + count($application->housing_relief_quotation_documents) + count($application->school_supplies_relief_quotation_documents))
                <div class="bhoechie-tab-content">
                    <!-- Profile Image -->
                    <div class="my-0">
                        <div class="box-body box-profile text-center">
                            
                            <h3 class="profile-username"><strong>Uploaded Documents</strong></h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-danger">
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if (count($application->fire_service_report_documents))
                                <strong><i class="fa fa-file-alt margin-r-5"></i> Fire Service Report</strong>                                
                                <p class="text-muted">
                                    @foreach ($application->fire_service_report_documents as $doc)
                                    <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    @endforeach
                                </p>
                                <hr>
                            @endif

                            @if (count($application->regional_corporation_flooding_report_documents))
                                <strong><i class="fa fa-file-alt margin-r-5"></i> Regional Corporation Flooding Report</strong>                                
                                <p class="text-muted">
                                    @foreach ($application->regional_corporation_flooding_report_documents as $doc)
                                    <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    @endforeach
                                </p>
                                <hr>
                            @endif

                            @if (count($application->clothing_relief_quotation_documents))
                                <strong><i class="fa fa-file-alt margin-r-5"></i> Clothing Relief Quotation</strong>                                
                                <p class="text-muted">
                                    @foreach ($application->clothing_relief_quotation_documents as $doc)
                                    <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    @endforeach
                                </p>
                                <hr>
                            @endif

                            @if (count($application->housing_relief_quotation_documents))
                                <strong><i class="fa fa-file-alt margin-r-5"></i> Housing Relief Quotation</strong>                                
                                <p class="text-muted">
                                    @foreach ($application->housing_relief_quotation_documents as $doc)
                                    <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    @endforeach
                                </p>

                                <hr>
                            @endif

                            @if (count($application->school_supplies_relief_quotation_documents))
                                <strong><i class="fa fa-file-alt margin-r-5"></i> School Supplies Relief Quotation</strong>                                
                                <p class="text-muted">
                                    @foreach ($application->school_supplies_relief_quotation_documents as $doc)
                                    <button class="btn btn-danger btn-sm documentModalView" style="margin: 5px 2px" style="margin-bottom: 5px" document="{{$doc->document_url}}"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    @endforeach
                                </p>
                                <hr>
                            @endif
                            
                        </div>
                    </div>
                </div>
                @endif

                {{-- History --}}
                @if (count($application->history))
                <div class="bhoechie-tab-content">
                    <!-- Profile Image -->
                    <div class="my-0">
                        <div class="box-body box-profile text-center">
                            
                            <h3 class="profile-username"><strong>History</strong></h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-danger">
                        <!-- /.box-header -->
                        <div class="box-body" style="padding-top: 20px">
                    
                            <!-- application audit trail -->
                            @if (count($application->history))

                                @foreach ($application->history as $item)
                                    {{$item->oldStatus->status}} <i class="fa fa-arrow-right"></i> {{$item->newStatus->status}} <br>

                                    <br>
                                    <blockquote>
                                        <p class="text-justify">{!!$item->details!!}</p>
                                        
                                        {{-- supervisor remarks --}}
                                        @if ($item->status_new == 9)

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <p>Approved Items Lost or Damaged</p>
                                                    <div class="col-md-12">
                                                        
                                                        @foreach ($item->approvals as $key => $items)
                                                            @if ($key == 'item')
                                                                @foreach ($items as $item_lost)
                                                                    <div class="custom-control custom-checkbox">
                                                                        <p class="custom-control-label my-1">
                                                                            {{$item_lost['key']}} 
                                                                            <span class="label label-{{$item_lost['value'] == 'rejected'? 'danger' : 'default'}} label-list">{{$item_lost['value']}}</span>
                                                                        </p>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($item->approval_grants)
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <p>Approved Grants</p>
                                                        <div class="col-md-12">
                                                            @if ($item->approval_grant_food_card && isset($item->approval_grant_food_card['emergency_food_card_value']) && isset($item->approval_grant_food_card['emergency_food_card_period']))
                                                                <div class="custom-control custom-checkbox">
                                                                    <p class="custom-control-label my-1">
                                                                        Emergency Food Card 
                                                                        <span class="label label-default label-list">${{number_format($item->approval_grant_food_card['emergency_food_card_value'],2)}} for {{$item->approval_grant_food_card['emergency_food_card_period'] == '1'? $item->approval_grant_food_card['emergency_food_card_period'] .' month' : $item->approval_grant_food_card['emergency_food_card_period'] .' months'}}</span>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            
                                                            @if ($item->approval_grant_rent && isset($item->approval_grant_rent['general_assistance_rent_value']) && isset($item->approval_grant_rent['general_assistance_rent_period']))
                                                                <div class="custom-control custom-checkbox">
                                                                    <p class="custom-control-label my-1">
                                                                        General Assistance - Rental
                                                                        <span class="label label-default label-list">${{number_format($item->approval_grant_rent['general_assistance_rent_value'],2)}} for {{$item->approval_grant_rent['general_assistance_rent_period'] == '1'? $item->approval_grant_rent['general_assistance_rent_period'] .' month' : $item->approval_grant_rent['general_assistance_rent_period'] .' months'}} from {{$item->approval_grant_rent['general_assistance_rent_month']}}</span>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            
                                                            @if ($item->approval_grant_counselling_services && isset($item->approval_grant_counselling_services['counselling_services']))
                                                                <div class="custom-control custom-checkbox">
                                                                    <p class="custom-control-label my-1">
                                                                        Counselling Services 
                                                                        <span class="label label-default label-list">{{$item->approval_grant_counselling_services['counselling_services']}}</span>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        {{-- welfare officer I remarks --}}
                                        @if ($item->status_new == 6)

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    @php $rejected = []; @endphp
                                                    <div class="form-group">
                                                        <p>Confirmed Household Members</p>
                                                        <div class="col-md-12 checkbox-group required">
                                                            <h4 style="margin-top: 0">
                                                                @foreach ($item->approvals as $key => $applicant)
                                                                    @if ($key == 'applicant')
                                                                        <span class="label label-success label-list">{{$applicant[0]['key']}}</span>
                                                                    @endif
                                                                    @if ($key == 'household')
                                                                        @foreach ($applicant as $row)
                                                                            @if ($row['value'] == 'recommended')
                                                                                <span class="label label-default label-list">{{$row['key']}}</span>
                                                                            @else
                                                                                @php $rejected[] = $row['key'] ; @endphp
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </h4>
                                                        </div>
                                                    </div>
                        
                                                    @if (count($rejected))
                                                        <div class="form-group">
                                                            <p>Rejected Household Members</p>
                                                            <div class="col-md-12">
                                                                <h4 style="margin-top: 0">
                                                                    @foreach ($rejected as $applicant)
                                                                        <span class="label label-danger label-list">{{$applicant}}</span>
                                                                    @endforeach
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <p>Recommended Items Lost or Damaged</p>
                                                    <div class="col-md-12">
                                                        @foreach ($item->approvals as $key => $items)
                                                            @if ($key == 'item')
                                                                @foreach ($items as $item_lost)
                                                                    <div class="custom-control custom-checkbox">
                                                                        <p class="custom-control-label my-1">
                                                                            {{$item_lost['key']}} 
                                                                            
                                                                            <i class="fa {{$item_lost['value'] == 'recommended'? 'fa-check-square text-green' : 'fa-window-close text-red'}} fa-lg" style="margin-left: 5px"></i>
                                                                        </p>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <small><cite title="Source Title">
                                            <i class="fa fa-user margin-r-5"></i> {{$item->user_name}}
                                        </cite></small>
                                        <small><cite title="Source Title">
                                            <i class="fa fa-tag margin-r-5"></i> {{$item->user_role}}
                                        </cite></small>
                                        <small><cite title="Source Title">
                                            <i class="fa fa-calendar margin-r-5"></i> {{$item->since}}
                                        </cite></small>
                                    </blockquote>

                                    <hr>
                                @endforeach

                            @endif
                            <!-- /.box -->
                            
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

{{-- document view modal --}}
<div class="modal fade" id="documentViewModal" tabindex="-1" role="dialog" aria-labelledby="documentViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="height: 100%;">
        <div class="modal-content" style="height: 95%; overflow: auto;">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                <button type="button" class="close" style="color: red" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i> close
                </button>
            </div>
            <div class="modal-body" style="height: 100%;">
                <iframe class="doc" src="" id="documentViewModalFrame" style="height: 100%;"></iframe>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>

{{-- status change modal --}}
<div class="modal fade" id="stateDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Status Change Details For Application</h4>
            </div>
            
            <form method="POST" action="#" enctype="multipart/form-data" id="statusForm">
                @csrf
                {{-- @method('PUT') --}}
                
                <div class="modal-body">
                    
                    <input type="hidden" value="{{$application->id}}" name="id" id="statusFormID">
                    
                    <div class="form-group">
                        <label class="">Intended Status: <span class="label label-default" style="font-size: larger; margin-left:15px" id="newstatus">New Status</span></label>
                        {{-- <p class="form-control-static"></p> --}}
                        <input type="hidden" name="status" id="statusFormStatus">
                    </div>
                    
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" rows="3" name="details" id="statusFormDetails" maxlength="1000"></textarea>
                                    
                        <span class="help-block text-danger" style="color: #a94442;">
                            <strong id="err-status"></strong>
                        </span>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btn_status_submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Lightbox -->
<script src="{{ asset('js/admin/lightbox/ekko-lightbox.min.js') }}"></script>

<script>

    // setup ajax
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    
    // status change
    $(document).on('click', '#btn_status_submit', function() {
        $(this).button('loading');
        var status = $('#statusFormStatus').val();
        // console.log(status)

        var data = {
            'id': $('#statusFormID').val(),
            'status': status,
            'details': $('#statusFormDetails').val(),
            'reference_number': $('#statusFormReferenceNumber').val(),
        }
        // console.log(applicant);
        
        $.ajax({
            type: 'POST',
            url: "{{route('updatestatus')}}",
            data: data,
            success: function(response) {
                success('Submission sent successfully.');
                $('#loadingModal').modal('show');
                setTimeout(() => {
                    location.reload();
                }, 1500);
                // console.log(response)
            },
            error: function(response) {
                var msg = response.responseJSON.msg;
                $('#btn_status_submit').button('reset');
                $('#err-status').html('<i class="fas fa-exclamation-triangle"></i> ' + msg);
                failure(msg);
                // console.log(response)
            }
        });

    });

    // focus on details textarea after modal shown
    $('#stateDetailsModal').on('shown.bs.modal', function (e) {
        $('#statusFormDetails').focus();
    })

    // clear form after modal hidden
    $('#stateDetailsModal').on('hidden.bs.modal', function (e) {
        $('.form-control').val('');
        $('#err-status').html('');
    })

    // status change modal show
    $(document).on('click', '.status', function() {
        var status = $(this).attr('status');
        var statusId = $(this).attr('statusId');
        // console.log(status);
        // console.log(statusId);

        if (statusId == 6 || statusId == 9) {
            $('#approvalrequestStatus').val(status);
            $('#approvalrequestStatusID').val(statusId);
            $('#approvalrequestForm').prop('action', "{{route('approvalrequest')}}").submit();
        } else {
            $('#stateDetailsModal').modal('show');
            $('#newstatus').html(status);
            $('#statusFormStatus').val(statusId);
        }
    });

    // view document in modal
    $(document).on('click', '.documentModalView', function() {
        var url = $(this).attr('document');
        $('#documentViewModalFrame').prop('src', url);
        $('#documentViewModal').modal('show');
    });

    // lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    // tab control
    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
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