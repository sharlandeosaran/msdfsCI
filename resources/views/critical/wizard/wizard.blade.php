@extends('layouts.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>
</ol>
@endsection

@section('content')
@include('common.errors')

<main class="align-items-center">
    <div class="col-lg-10 col-md-12 offset-lg-1">
        
        <form id="formb" method="POST" action="{{route('formcriticalpost')}}" enctype="multipart/form-data" role="form">
            @csrf
            
            <div id="wizard">
                
                @include('critical.wizard.guidelines')
                @include('critical.wizard.general_info')
                @include('critical.wizard.household_info')
                @include('critical.wizard.disaster')
                @include('common.wizard.uploads')
                @include('critical.wizard.submit')
                
            </div>
        </form>
    </div>
</main>

@endsection

@section('scripts')
<script src="{{ asset('js/wizard_validation_critical.js') }}" defer></script>

<script>
    $(document).ready(function(){
        @include('common.wizard.script')
        
        $('#householdInfoSection').html('2');
        $('#uploadsSection').html('4');
        $('.critical_uploads').removeClass('hide');
        $('#employer_recommender_letter_div').addClass('hide');
        
        // items lost or damaged changed
        $(document).on('change', '.items_lost_or_damaged', function() {
            var checked = $(this).prop("checked");
            var id = $(this).prop("id");
            // console.log(checked)
            // console.log(id)
            
            if (id == 'school_supplies' && checked) {
                $('.school_supplies_div').removeClass('hide');
            } else {
                $('.school_supplies_div').addClass('hide');
            }
        });
        
        // show/hide recovery_needs_input_group once damage household item is selected
        $(document).on('change', '.household_damage_items', function() {
            var boxes = $('.household_damage_items:checkbox:checked');
            var id = $( this ).prop('id');

            if (boxes.length > 0) {
                $('.recovery_needs_div').addClass('hide');
                boxes.each(function( index ) {
                    $('#recovery_needs_'+ $( this ).prop('id')).removeClass('hide');
                });
                $('#recovery_needs_input_'+ id).focus();
            } else {
                $('.recovery_needs_div').addClass('hide');
            }
        });
        
        // show/hide disaster remarks
        $(document).on('change', '.disaster', function() {
            var id = $( this ).prop('id');
            $('.water_marks_div, .fire_div').addClass('hide');
            // console.log(id)

            // if disaster is other show remarks textarea
            if (id == 'other_disaster') {
                $('#other_disaster_remarks_div').removeClass('hide');
                $('#other_disaster_remarks').focus();
            } else {
                $('#other_disaster_remarks_div').addClass('hide');
            }

            // if flooding show water damages uploads
            if ($( this ).prop('id') == 'flooding') {
                $('.water_marks_div').removeClass('hide');
            }
            
            // if fire show fire damages uploads
            if ($( this ).prop('id') == 'fire') {
                $('.fire_div').removeClass('hide');
            }
        });
        
        // show/hide housing repairs required
        $(document).on('change', '[name = "housing_damage"]', function() {
            var val = $(this).val();
            console.log(val);

            if (val == 'yes') {
                $('.housing_repairs_div').removeClass('hide');
                $('#housing_repairs').focus();
            } else {
                $('.housing_repairs_div').addClass('hide');
                $('.housing_insurer_div').addClass('hide');
                $('[name = "housing_infrastructure_insured"]').prop('checked', false);
            }
        });
        
        // show/hide housing infrastructure insured
        $(document).on('change', '[name = "housing_infrastructure_insured"]', function() {
            var val = $(this).val();
            console.log(val);

            if (val == 'yes') {
                $('.housing_insurer_div').removeClass('hide');
            } else {
                $('.housing_insurer_div').addClass('hide');
            }
        });

        // change classification of applicant after entered
        $(document).on('change', '#employment_classification', function(){
            $('#hi_emp_classification').val($(this).val());
        });

        // db datepicker
        function dob() {
            $('.dob').datepicker({
                format: "yyyy-mm-dd",
                endDate: "now()",
                startView: 3,
                autoclose: true
            });
        }
        setTimeout(() => { dob(); }, 100);

        // add household income rows
        $(document).on('click', '.critical_add_household', function() {
            var rows = $('.household_row').length;
            if (rows < 10) {
                    
                // add income row
                $('#household_tbody').append('<tr class="household_row" id="household_row_'+householdCount+'"><td>    <div class="form-group" id="" style="margin-bottom: 0;"><input type="text" class="form-control form-control-sm hi_name" count="'+householdCount+'" id="hi_first_name_'+householdCount+'" name="hi_first_name['+householdCount+']" aria-describedby="" required maxlength="100" placeholder="First Name"><span class="help-block"> </div> <div class="form-group" id="" style="margin-bottom: 0;"><input type="text" class="form-control form-control-sm hi_name" count="'+householdCount+'" id="hi_surname_'+householdCount+'" name="hi_surname['+householdCount+']" aria-describedby="" required maxlength="100" placeholder="Surname"><span class="help-block"> </div> </td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="M">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="F">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td> <td>    <div class="form-group" id=""> <select class="form-control form-control-sm chosen-select" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']"> <option disabled="" selected="">select...</option> @foreach ($relationships as $id => $row) <option value="{{$id}}">{{$row}}</option> @endforeach </select> <span class="help-block"> </div></td><td>    <div class="form-group" id=""><input type="text" class="form-control form-control-sm dob" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required placeholder="yyyy-mm-dd"><span class="help-block"> </div></td> <td>    <div class="form-group" id=""> <select class="form-control form-control-sm chosen-select" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']"> <option disabled="" selected="">select...</option> @foreach ($employment_status as $id => $row) <option value="{{$id}}">{{$row}}</option> @endforeach </select> <span class="help-block"> </div></td><td>    <div class="form-group" id=""><input type="text" class="form-control form-control-sm" id="hi_national_id_'+householdCount+'" name="hi_national_id['+householdCount+']" aria-describedby="" required maxlength="11"><span class="help-block"> </div></td><td><button class="btn btn-sm btn-primary critical_del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');

                // add uploads row
                $('#uploads_tbody').append('<tr id="uploads_row_'+householdCount+'"> <td class=" table-active text-right align-middle" width="20%"> <div class="form-group mb-0" id="grp-proof_of_earnings_'+householdCount+'"> <label class="control-label mb-0" for="proof_of_earnings_'+householdCount+'"> Proof of Earnings for <span id="hi_name_'+householdCount+'_span"></span> <i class="fa fa-info-circle" aria-hidden="true" title="Proof of actual earnings must be submitted such as a payslip or job letter for employed household members."></i> </label> </div> </td> <td width="80%"> <div class="input-group mb-0"> <div class="custom-file"> <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_of_earnings_'+householdCount+'" name="proof_of_earnings['+householdCount+']" required> <label class="custom-file-label" for="proof_of_earnings_'+householdCount+'" id="proof_of_earnings_'+householdCount+'Label">Choose file</label> </div> </div><span class="help-block"> <strong id="err-proof_of_earnings_'+householdCount+'"></strong> </span> </td> </tr>');

                // increment count
                householdCount++;
                
                dob();
            }
        });
        
        // delete household income row
        $(document).on('click', '.critical_del_household', function() {
            var num = $(this).attr('num');
            $('#household_row_'+num).remove();
            $('#uploads_row_'+num).remove();
        });

        // if rent selected get landlord info
        $(document).on('change', '#housing_type', function() {
            var val = $(this).val();
            if (val == 4) {
                $('.landlord-fields').removeClass('hide');
                $('.landlord').prop('required', true);
            } else {
                $('.landlord-fields').addClass('hide');
                $('.landlord').prop('required', false).val('');
            }
        });
        
    });
</script>

@endsection