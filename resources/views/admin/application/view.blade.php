@extends('admin.modalapp')

@section('content')

<style>
    
    /*  bhoechie tab */
    div.bhoechie-tab-container{
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border:1px solid #ddd;
        margin-top: 20px;
        margin-left: 50px;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
    }
    div.bhoechie-tab-menu{
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group{
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a{
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a .glyphicon,
    div.bhoechie-tab-menu div.list-group>a .fa {
        color: #dd4b39;
    }
    div.bhoechie-tab-menu div.list-group>a:first-child{
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a:last-child{
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a.active,
    div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
    div.bhoechie-tab-menu div.list-group>a.active .fa{
        background-color: #dd4b39;
        background-image: #dd4b39;
        color: #ffffff;
    }
    /* div.bhoechie-tab-menu div.list-group>a.active:after{
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #dd4b39;
    } */
    
    div.bhoechie-tab-content{
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding-left: 20px;
        padding-top: 10px;
    }
    
    div.bhoechie-tab div.bhoechie-tab-content:not(.active){
        display: none;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @if(isset($title)) {{ $title }} @endif  | <strong>{{$application->applicant->region}}</strong>
    </h1>
</section>

<section class="content" style="font-size: 15px">
    
    <div class="box box-danger my-0">
        <div class="box-body box-profile">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 bhoechie-tab-menu text-center" style="margin-top: 10px;">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-file"></h4><br/>Application Details
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-home"></h4><br/>Household
                    </a>
                    @if ($application->household->housing_type_id == 4)
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-user"></h4><br/>Landlord Details
                    </a>
                    @endif
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-alert"></h4><br/>Disaster Details
                    </a>
                    @if (1 == 2)
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-picture"></h4><br/>Photos
                    </a>
                    @endif
                </div>
            </div>
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

                            <p><strong><i class="fa fa-hashtag margin-r-5"></i> Ref Number | {{$application->id}}</strong></p>
                            <hr>

                            <p>
                                <strong>
                                    <i class="fa fa-info-circle margin-r-5"></i> Status | 
                                    <span class="label label-{{$application->status_colour}}" style="font-size: 100%;">{{$application->status}}</span>
                                </strong>
                            </p>
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
                                    {{$application->household->housing_type->type}}
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
                
                {{-- household --}}
                <div class="bhoechie-tab-content">
                    <div class="my-0">
                        <div class="box-body box-profile text-center" style="padding-bottom: 5px;">
                            
                            <h3 class="profile-username">
                                <strong>Household{{count($application->household_people) == 1? '' : ' ('.count($application->household_people).')'}}</strong>
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
                                    
                                    @foreach ($application->household_people as $applicant)
                                    <li role="presentation" class="{{$loop->first? 'active' : ''}} applicant_tabs">
                                        <a href="#applicanttab{{$applicant->person->id}}" aria-controls="applicanttab{{$applicant->person->id}}" role="tab" data-toggle="tab">
                                            <strong>{{$applicant->person->name}}</strong>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @foreach ($application->household_people as $applicant)
                                    <div role="tabpanel" class="tab-pane {{$loop->first? 'active' : ''}}" id="applicanttab{{$applicant->person->id}}">

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
                                                
                                                <div class="">
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
                                                                
                                                                @if ($applicant->person->household_people_relationship)
                                                                <tr>
                                                                    <td class="active text-right align-middle" width="30%">
                                                                        <div class="">
                                                                            <label class="control-label">
                                                                                Relationship to Applicant
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td width="70%">
                                                                        <label class="control-label"> {{$applicant->person->household_people_relationship->relationship}} </label>
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
                @if ($application->household->housing_type_id == 4)
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
                                    {{$application->form_critical_incident()->disaster}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>                                
                                <p class="text-muted">
                                    {{$application->form_critical_incident()->disaster}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-dollar margin-r-5"></i> Rental Amount</strong>                                
                                <p class="text-muted">
                                    {{$application->form_critical_incident()->disaster}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-file-alt margin-r-5"></i> Documents</strong>                                
                                <p class="text-muted">
                                    {{$application->form_critical_incident()->disaster}}
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
                                    
                                @if ($application->form_critical_incident()->housing_damage)
                                    <p>
                                        <strong>
                                            <i class="fa fa-dollar margin-r-5"></i> Housing Damage | 
                                            @if ($application->form_critical_incident()->housing_damage == 'Y')
                                                <i class="fa fa-check-square fa-lg text-green" style="margin-left: 5px"></i>
                                            @else
                                                <i class="fa fa-window-close fa-lg text-red" style="margin-left: 5px"></i>
                                            @endif
                                        </strong>
                                    </p>
                                    <hr>
                                        
                                    @if ($application->form_critical_incident()->housing_damage == 'Y')

                                        @if ($application->form_critical_incident()->housing_repairs)
                                        <strong><i class="fa fa-wrench margin-r-5"></i> Housing Repairs</strong>                                
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
                <div class="bhoechie-tab-content">
                    <!-- Profile Image -->
                    <div class="my-0">
                        <div class="box-body box-profile text-center">
                            
                            <h3 class="profile-username"><strong>Uploaded Files</strong></h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box box-danger">
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($application->documents)
                                <p>
                                    <strong><i class="far fa-file-alt margin-r-5"></i> Uploads</strong>
                                </p>
                                
                                <p>
                                    @foreach ($application->documents as $doc)
                                    <button class="btn btn-danger btn-sm" style="margin-bottom: 5px"><i class="far {{$doc->type->icon}} margin-r-5"></i> {{$doc->file}} </button>
                                    <img src="{{$doc->document_url}}" alt="" height="30px">  <br>
                                    @endforeach
                                </p>
                                <hr>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>

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