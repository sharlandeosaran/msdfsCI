@extends('admin.modalapp')

@section('content')

<!-- Lightbox -->
<link rel="stylesheet" href="{{ asset('css/admin/lightbox/ekko-lightbox.css') }}">

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
    
    .show-grid [class^=col-] {
        padding-top: 10px;
        padding-bottom: 10px;
        border: 1px solid #ddd;
        border: 1px solid rgba(86,61,124,.2);
        list-style: none;
        margin-bottom: 5px;
    }
    
    .steps.glyphicon {
        margin-top: 5px;
        margin-bottom: 10px;
        font-size: 20px;
    }
    
    .steps.inactive { 
        color: #ccc;
        background-color: #fafafa;
    } 
    
    .steps.active { 
        color: #fff;
        background-color: #dd4b39;
    } 

    .media-body {
        font-size: 13px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $status_id == 6? 'Assessment' : 'Approval' }} Form | <strong>Ref # {{$application->form_critical_incident()? $application->form_critical_incident()->reference_number : ''}}</strong>
    </h1>
</section>

<section class="content" style="font-size: 15px">
    
    <div class="box box-danger my-0">
        <div class="box-body box-profile">
            @include('common.errors')
            
            <form method="POST" action="{{route('approvalpost')}}" enctype="multipart/form-data" id="approvalForm">
                @csrf
                
                <div class="">
                    
                    <input type="hidden" value="{{$application->id}}" name="id">
                    <input type="hidden" value="{{$status_id}}" name="status">

                    <div class="col-sm-6">
                        @if ($application->household->housing_type)
                            <strong><i class="fa fa-home margin-r-5"></i> Household Type</strong>                                
                            <p class="text-muted">
                                {{$application->household->housing_type->type}} Household of {{count($application->household_people) == 1? '1 Person' : count($application->household_people).' People'}}

                                @if ($application->household->children_count)
                                    <br>{{$application->household->children_count}} Children
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

                        @if ($status_id == 6)
                            <div class="form-group">
                                <label for="reference_number">Confirm Household Members</label>
                                <div class="col-md-12 checkbox-group required">
                                    @foreach ($application->household_people as $applicant)
                                        <div class="custom-control custom-checkbox" id="items_div_{{$applicant->person->id}}">
                                            <input type="checkbox" class="custom-control-input household" id="household_{{$applicant->person->id}}" name="household[]" {{old('household.'.$applicant->person->id) == $applicant->person->id? 'checked' : '' }} value="{{$applicant->person->id}}">
                                            <label class="custom-control-label my-1" for="household_{{$applicant->person->id}}">{{$applicant->person->name}} ({{$applicant->relationship->relationship}})</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            @php $rejected = []; @endphp
                            <div class="form-group">
                                <label for="reference_number">Confirmed Household Members</label>
                                <div class="col-md-12 checkbox-group required">
                                    <h4 style="margin-top: 0">
                                        <span class="label label-danger">{{$application->applicant->name}} (Applicant)</span>
                                        @foreach ($application->household_people as $applicant)
                                            @if ($applicant->person->id != $application->applicant->person_id)
                                                @if ($applicant->confirm)
                                                    <span class="label label-default">{{$applicant->person->name}} ({{$applicant->relationship->relationship}})</span>
                                                @else
                                                    @php $rejected[] = $applicant->person->name .' ('. $applicant->relationship->relationship .')' ; @endphp
                                                @endif
                                            @endif
                                        @endforeach
                                    </h4>
                                </div>
                            </div>

                            @if (count($rejected))
                                <div class="form-group">
                                    <label for="reference_number">Rejected Household Members</label>
                                    <div class="col-md-12 checkbox-group required">
                                        <h4 style="margin-top: 0">
                                            @foreach ($rejected as $applicant)
                                                <span class="label label-default">{{$applicant}}</span>
                                            @endforeach
                                        </h4>
                                    </div>
                                </div>
                            @endif
                            <hr style="clear: both; padding-bottom: 10px;">

                            <div class="form-group">
                                <label for="reference_number">Welfare Officer I Report</label>
                                <div class="col-md-12 checkbox-group required">
                                    <blockquote>
                                        <p>{{$application->welfare_officer_report->details}}</p>
                                        <footer>{{$application->welfare_officer_report->changedBy->name}}</footer>
                                    </blockquote>
                                </div>
                            </div>

                        @endif
                        <hr style="clear: both; padding-bottom: 10px;">
                    </div>
                    
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="reference_number">{{ $status_id == 6? 'Recommend' : 'Approve' }} Items Lost or Damaged</label>
                            <div class="col-md-12 checkbox-group required">
                                @foreach ($application->form_critical_incident()->items_lost as $item)
                                    <div class="custom-control custom-checkbox" id="items_div_{{$item->slug}}">
                                        <input type="checkbox" class="custom-control-input items_lost_or_damaged" id="{{$item->slug}}" name="items_lost_or_damaged[{{$item->slug}}]" {{old('items_lost_or_damaged.'.$item->slug) == $item->id? 'checked' : '' }} value="{{$item->id}}">
                                        <label class="custom-control-label my-1" for="{{$item->slug}}">{{$item->item}}</label>
                                    </div>
                                    
                                    @if ($application->status_id == 8)
                                        @php
                                            $max = $item->max_value;
                                            $max_label = '$'. number_format($max);
                                            if (in_array($item->slug, ['school_supplies_primary', 'school_supplies_secondary', 'clothing'])) {
                                                switch ($item->slug) {
                                                    case 'clothing':
                                                        $max *= count($application->household_people);
                                                        $max_label = '$'. number_format($max) .' ($'. number_format($item->max_value) .' x '. count($application->household_people) .' in household)';
                                                        break;
                                                    
                                                    case 'school_supplies_primary':
                                                        $max *= $application->household->primary_student_count;
                                                        $max_label = '$'. number_format($max) .' ($'. number_format($item->max_value) .' x '. $application->household->primary_student_count .' primary student'. ($application->household->primary_student_count == 1? '' : 's') .')';
                                                        break;
                                                    
                                                    case 'school_supplies_secondary':
                                                        $max *= $application->household->secondary_student_count;
                                                        $max_label = '$'. number_format($max) .' ($'. number_format($item->max_value) .' x '. $application->household->secondary_student_count .' secondary student'. ($application->household->secondary_student_count == 1? '' : 's') .')';
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                }
                                            }
                                        @endphp
                                        <div class="mb-2 hide recovery_needs_div" style="margin-bottom: 10px" id="recovery_needs_{{$item->slug}}">
                                            <input type="number" min="0" step="1" class="form-control recovery_needs_input" id="recovery_needs_input_{{$item->slug}}" aria-describedby="recovery_needs_{{$item->slug}}" name="recovery_needs[{{$item->slug}}]" value="{{old('recovery_needs.'.$item->slug)}}" placeholder="maximum value {{$max}}" max="{{$max}}">

                                            <span class="help-block text-muted">
                                                <strong>maximum value {{$max_label}}</strong>
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr style="clear: both; padding-bottom: 10px;">

                        @if ($application->status_id == 8)
                            <div class="form-group">
                                <label for="reference_number">Award Other Grants</label>
                                <div class="col-md-12 checkbox-group required">
                                    <div class="custom-control custom-checkbox" id="grant_">
                                        <input type="checkbox" class="custom-control-input grants" id="emergency_food_card" name="grants['emergency_food_card']">
                                        <label class="custom-control-label my-1" for="emergency_food_card">Emergency Food Card </label>
                                    </div>
                                    <div class="mb-2 hide recovery_needs_div" style="margin-bottom: 10px" id="recovery_needs_emergency_food_card">
                                        <input type="number" min="0" step="1" class="form-control recovery_needs_input" id="recovery_needs_input_emergency_food_card" aria-describedby="recovery_needs_emergency_food_card" name="recovery_needs['emergency_food_card']" value="old('recovery_needs.'.$item->slug)}}" placeholder="maximum value $item->max_value}}" max="$item->max_value}}">
                                    </div>
                                    
                                    <div class="custom-control custom-checkbox" id="grant_">
                                        <input type="checkbox" class="custom-control-input grants" id="general_assistance_grant" name="grants['general_assistance_grant']">
                                        <label class="custom-control-label my-1" for="general_assistance_grant">General Assistance Grant</label>
                                    </div>
                                    <div class="mb-2 hide recovery_needs_div" style="margin-bottom: 10px" id="recovery_needs_general_assistance_grant">
                                        <input type="number" min="0" step="1" class="form-control recovery_needs_input" id="recovery_needs_input_general_assistance_grant" aria-describedby="recovery_needs_general_assistance_grant" name="recovery_needs['general_assistance_grant']" value="old('recovery_needs.'.$item->slug)}}" placeholder="maximum value $item->max_value}}" max="$item->max_value}}">
                                    </div>
                                    
                                    {{-- <div class="custom-control custom-checkbox" id="grant_">
                                        <input type="checkbox" class="custom-control-input grants" id="clothing_grant" name="grants['clothing_grant']">
                                        <label class="custom-control-label my-1" for="clothing_grant">Clothing Grant</label>
                                    </div>
                                    <div class="mb-2 hide recovery_needs_div" style="margin-bottom: 10px" id="recovery_needs_clothing_grant">
                                        <input type="number" min="0" step="1" class="form-control recovery_needs_input" id="recovery_needs_input_clothing_grant" aria-describedby="recovery_needs_clothing_grant" name="recovery_needs['clothing_grant']" value="old('recovery_needs.'.$item->slug)}}" placeholder="maximum value $item->max_value}}" max="$item->max_value}}">
                                    </div>
                                    
                                    <div class="custom-control custom-checkbox" id="grant_">
                                        <input type="checkbox" class="custom-control-input grants" id="school_supplies" name="grants['school_supplies']">
                                        <label class="custom-control-label my-1" for="school_supplies">School Supplies</label>
                                    </div>
                                    <div class="mb-2 hide recovery_needs_div" style="margin-bottom: 10px" id="recovery_needs_school_supplies">
                                        <input type="number" min="0" step="1" class="form-control recovery_needs_input" id="recovery_needs_input_school_supplies" aria-describedby="recovery_needs_school_supplies" name="recovery_needs['school_supplies']" value="old('recovery_needs.'.$item->slug)}}" placeholder="maximum value $item->max_value}}" max="$item->max_value}}">
                                    </div> --}}
                                    
                                    <div class="custom-control custom-checkbox" id="grant_">
                                        <input type="checkbox" class="custom-control-input grants" id="counselling_services" name="grants['counselling_services']">
                                        <label class="custom-control-label my-1" for="counselling_services">Counselling Services</label>
                                    </div>
                                    <div class="mb-2 hide recovery_needs_div" style="margin-bottom: 10px" id="recovery_needs_counselling_services">
                                        <input type="number" min="0" step="1" class="form-control recovery_needs_input" id="recovery_needs_input_counselling_services" aria-describedby="recovery_needs_counselling_services" name="recovery_needs['counselling_services']" value="old('recovery_needs.'.$item->slug)}}" placeholder="maximum value $item->max_value}}" max="$item->max_value}}">
                                    </div>
                                    
                                </div>
                            </div>
                            <hr style="clear: both; padding-bottom: 10px;">
                        @endif
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="details" style="margin-top: 20px">Details</label>
                            <textarea class="form-control" rows="3" name="details" id="details" maxlength="1000" required></textarea>
                        </div>
                        
                        @if ($application->status_id == 5)
                        <div class="form-group">
                            <label for="reference_number">Site Evidence</label>
                            <div class="input-group mb-0">
                                <div class="custom-file">
                                    <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" id="site_evidence" name="site_evidence[]" value="" multiple>
                                </div>
                            </div>

                            <span class="help-block">
                                <strong>* Accepted Image Types: png, jpg and jpeg | Maximum Image Size: 10Mb</strong>
                            </span>
                        </div>
                        @endif

                        <div class="form-group">          
                            <span class="help-block text-danger" style="color: #a94442;">
                                <strong id="err-status"></strong>
                            </span>
                        </div>
                        
                        <button type="button" class="btn btn-danger" id="btn_status_cancel"><i class="fas fa-close"></i> Cancel</button>
                        <button type="submit" class="btn btn-success" id="btn_status_submit"><i class="fas fa-check"></i> Submit</button>
                    </div>

                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script>
        
    // items lost or damaged changed
    $(document).on('change', '.items_lost_or_damaged', function() {
        var boxes = $('.items_lost_or_damaged:checkbox:checked');
        $('.recovery_needs_div').addClass('hide');
        // console.log(boxes)

        if (boxes.length > 0) {
            boxes.each(function( index ) {
                $('#recovery_needs_'+ $( this ).prop('id')).removeClass('hide');
                $('#recovery_needs_input_'+ $( this ).prop('id')).focus();
                // console.log($( this ).prop('id'))
            });
        } else {
            $('.recovery_needs_input').val('');
        }
    });

    // cancel
    $(document).on('click', '#btn_status_cancel', function() {
        loading($(this))
        window.location.href = "{{url('/admin/applications/view/'.$application->id)}}";
    });

    // loading state
    function loading(btn) {
        btn.html("<i class='fa fa-spinner fa-pulse fa-fw'></i>");
        $('#loadingModal').modal('show');
    }
        
</script>
@endsection