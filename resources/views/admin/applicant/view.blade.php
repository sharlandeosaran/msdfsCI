@extends('admin.modalapp')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @if(isset($title)) {{ $title }} @endif  | <strong>{{$applicant->application->exemption_type}}</strong>
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
                                
                                <h3 class="profile-username"><strong>{!!$applicant->name!!}</strong></h3>
                                
                                
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
                                <p class="text-muted">{{$applicant->application->name}}</p>
                                <hr>

                                <strong><i class="fa fa-phone margin-r-5"></i> Representative Contact</strong>                                
                                <p class="text-muted">
                                    {{$applicant->application->contact}}
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-envelope margin-r-5"></i> Representative Email</strong>                                
                                <p class="text-muted"> <a href="mailto:{{$applicant->application->email}}">{{$applicant->application->email}}</a></p>
                                <hr>
                                
                                <strong><i class="fa fa-users margin-r-5"></i> Travel Party</strong>                                
                                <p class="text-muted">{{$applicant->application->travel_party_text}}</p>
                                <hr>
                                
                                <strong><i class="fa fa-globe margin-r-5"></i> Country</strong>                                
                                <p class="text-muted">
                                    {{$applicant->application->country->country}}
                                                                
                                    @if ($applicant->application->country_id == 240 && $applicant->application->us_state)
                                         | {{$applicant->application->us_state->state}} 
                                    @endif
                                    
                                    @if ($applicant->application->country_id == 235 && $applicant->application->uk_country)
                                         | {{$applicant->application->uk_country->country}} 
                                    @endif

                                    @if ($applicant->application->country_id == 37 && $applicant->application->canadian_province)
                                         | {{$applicant->application->canadian_province->province}} 
                                    @endif
                                    
                                    @if (!in_array($applicant->application->country_id, [240, 235, 37]) && $applicant->application->city_state)
                                         | {{$applicant->application->city_state}} 
                                    @endif
                                </p>
                                <hr>
                                
                                <strong><i class="fa fa-calendar margin-r-5"></i> Created</strong>                                
                                <p class="text-muted">{{$applicant->application->since}}</p>
                                <hr>
                                
                                <p>
                                    <strong>
                                        <i class="fa fa-plane margin-r-5"></i> Travel Arrangements 
                                        @if ($applicant->application->travel_arrangements == 'Y')
                                            <i class="fa fa-check-square fa-lg text-green" style="margin-left: 5px"></i>
                                        @else
                                            <i class="fa fa-window-close fa-lg text-red" style="margin-left: 5px"></i>
                                        @endif
                                    </strong>
                                </p>
                                <hr>
                                
                                @if ($applicant->application->quarantine_pay && $applicant->application->exemption_type == 'Inbound')
                                <p>
                                    <strong>
                                        <i class="fa fa-hospital margin-r-5"></i> Pay for Quarantine
                                        @if ($applicant->application->quarantine_pay == 'Y')
                                            <i class="fa fa-check-square fa-lg text-green" style="margin-left: 5px"></i>
                                        @elseif ($applicant->application->quarantine_pay == 'N')
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
                                
                                <div class="post">
                                    <div class="user-block">
                                        
                                        {{-- <div class="col-md-12" style="padding: 10px 0 15px 0">
                                            <span class="pull-right text-right">
                                                <span class="label label-{{$applicant->status_colour}}" style="font-size: 100%;">{{$applicant->status}}</span>
                                                

                                            </span>
                                        </div> --}}
                                        
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <tbody>
                                                                    
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
        
</script>
@endsection