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
            <input type="hidden" id="grecaptcha" name="grecaptcha">
            <input type="hidden" id="tempfiles" name="tempfiles" value="{{old('tempfiles')}}">
            
            <div id="wizard">
                
                @include('critical.wizard.guidelines')
                @include('critical.wizard.general_info')
                {{-- @include('critical.wizard.household_info') --}}
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
                
        // show community based on region
        $(document).on('change', '#region', function(){
            region_community();
        });
        function region_community() {
            var val = $('#region').val();
            $('#city_town').val('0');
            $('.communities').addClass('hide');
            $('.region_'+ val).removeClass('hide');
            // console.log(val)
        }
        region_community();

        // change gender of applicant after entered
        $(document).on('change', '.hi_gender', function(){
            var val = $(this).val();
            $('.hi_gender_'+ val).prop('checked', true);
            // console.log(val)
        });
        
        // other relationship show/hide
        $(document).on('change', '.hi_relationship', function() {
            var num = $( this ).attr('num');
            var text = $('#hi_relationship_'+num+' option:selected').text();

            // if status is other show remarks textarea
            if (text == 'Other') {
                $('#hi_relationship_other_'+num).removeClass('hide').focus();
            } else {
                $('#hi_relationship_other_'+num).addClass('hide').val('');
            }
        });
        
        // employee status change
        $(document).on('change', '.hi_emp_status', function() {
            var num = $( this ).attr('num');
            var text = $('#hi_emp_status_'+num+' option:selected').text();

            // if status is other show remarks textarea
            if (text == 'Other') {
                $('#hi_emp_status_other_'+num).removeClass('hide').focus();
            } else {
                $('#hi_emp_status_other_'+num).addClass('hide').val('');
            }

            // if student selected show school supplies in items lost
            school_supplies();
        });
        function school_supplies() {
            var vals = $('.hi_emp_status').map((_,el) => el.value).get();

            $('.items_lost_or_damaged_school_supplies').addClass('hide');
            if ($.inArray('7', vals) !== -1) {
                $('#items_div_school_supplies_primary').removeClass('hide');
            }else{
                $('#school_supplies_primary').prop('checked', false);
            }
            if ($.inArray('8', vals) !== -1) {
                $('#items_div_school_supplies_secondary').removeClass('hide');
            }else{
                $('#school_supplies_secondary').prop('checked', false);
            }
            
            // console.log(($.inArray('7', vals) === -1 && $.inArray('8', vals) === -1))
            if ($.inArray('7', vals) === -1 && $.inArray('8', vals) === -1) {
                $('.school_supplies_div').addClass('hide');
            }
        }
        school_supplies();
        
        // items lost or damaged changed
        $(document).on('change', '.items_lost_or_damaged', function() {
            var checked = $(this).prop("checked");
            var boxes = $('.items_lost_or_damaged:checkbox:checked');
            var id = $(this).prop("id");
            // console.log(boxes)
            // console.log(id)

            if (boxes.length > 0) {
                $('.items_lost_or_damaged_div').addClass('hide');
                boxes.each(function( index ) {
                    $('.'+ $( this ).prop('id') + '_div').removeClass('hide');
                    // console.log($( this ).prop('id'))
                });
            } else {
                $('.items_lost_or_damaged_div').addClass('hide');
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
        
        // disaster change function
        $(document).on('change', '#disaster', function() {
            var val = $( this ).val();
            $('.water_marks_div, .fire_div').addClass('hide');
            console.log(val)

            // if disaster is other show remarks textarea
            if (val == '5') {
                $('#other_disaster_div').removeClass('hide');
                $('#other_disaster').focus();
            } else {
                $('#other_disaster_div').addClass('hide');
            }

            // if flooding show water damages uploads
            if (val == '1') {
                $('.water_marks_div').removeClass('hide');
            }
            
            // if fire show fire damages uploads
            if (val == '2') {
                $('.fire_div').removeClass('hide');
            }
        });
        
        // show/hide housing repairs required
        $(document).on('change', '[name = "housing_damage"]', function() {
            var val = $(this).val();
            // console.log(val);

            if (val == 'Y') {
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

            if (val == 'Y') {
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

        // add household income 
        @if (old('hi_dob'))
        var householdCount = {{count(old('hi_dob')) + 1}};
        @else
        var householdCount = 2;
        @endif
        $(document).on('click', '.critical_add_household', function() {
            var rows = $('.critical_household_row').length;
            if (rows < 10) {
                    
                // add income row
                $('#additional_persons_div').append(' <div class="table-responsive critical_household_row travel_hi_row" id="household_row_'+householdCount+'"> <table class="table table-bordered table-sm">     <tbody>         <tr class=" table-active text-center"><td colspan="2">Person # '+householdCount+' <button class="btn btn-sm btn-primary critical_del_household pull-right" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i> remove member</button></td>         </tr>         <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0 grp-hi_first_name_'+householdCount+'">        <label class="control-label mb-0" for="hi_first_name_'+householdCount+'">  First Name <span class="red">*</span>   <i class="fa fa-info-circle hide" aria-hidden="true" title="State your first name as indicated on your identification card."></i>        </label>    </div></td><td width="80%">    <div class="form-group mb-0 grp-hi_first_name_'+householdCount+'">        <input type="text" class="form-control hi_name" id="hi_first_name_'+householdCount+'" name="hi_first_name['+householdCount+']" applicant="'+householdCount+'" aria-describedby="" value="" required maxlength="50">    </div></td>         </tr>     <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0 grp-hi_surname_'+householdCount+'">        <label class="control-label mb-0" for="hi_surname_'+householdCount+'">  Surname <span class="red">*</span>   <i class="fa fa-info-circle hide" aria-hidden="true" title="State your hi_surname as indicated on your identification card."></i>        </label>    </div></td><td width="80%">    <div class="form-group mb-0">        <input type="text" class="form-control hi_name" id="hi_surname_'+householdCount+'" name="hi_surname['+householdCount+']" applicant="'+householdCount+'" aria-describedby="" value="" required maxlength="50">  </div></td>         </tr>     <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0">        <label class="control-label mb-0" for="hi_gender_'+householdCount+'">  Gender <span class="red">*</span>   <i class="fa fa-info-circle hide" aria-hidden="true" title="State your first name as indicated on your identification card."></i>        </label>    </div></td><td width="80%">    <div class="form-group mb-0 grp-hi_gender_'+householdCount+'">        <div>  <div class="custom-control custom-radio custom-control-inline">      <div class="custom-control custom-radio">          <input type="radio" gender="hi_gender_'+householdCount+'" id="hi_gender_'+householdCount+'_1" name="hi_gender['+householdCount+']" class="custom-control-input" value="M" >          <label class="custom-control-label" for="hi_gender_'+householdCount+'_1">Male</label>      </div>  </div>  <div class="custom-control custom-radio custom-control-inline">      <div class="custom-control custom-radio">          <input type="radio" gender="hi_gender_'+householdCount+'" id="hi_gender_'+householdCount+'_2" name="hi_gender['+householdCount+']" class="custom-control-input" value="F" >          <label class="custom-control-label" for="hi_gender_'+householdCount+'_2">Female</label>      </div>  </div>        </div>  </div></td>         </tr>     <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0 grp-hi_dob_'+householdCount+'">        <label class="control-label mb-0" for="hi_dob-1">  Date of Birth <span class="red">*</span>   <i class="fa fa-info-circle hide" aria-hidden="true" title="State the date of birth of the person stated in the row in the format yyyy-mm-dd."></i>        </label>    </div></td><td width="80%">    <div class="form-group mb-0 grp-hi_dob_'+householdCount+'">        <input type="text" class="form-control dob" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" value="" required placeholder="yyyy-mm-dd">  </div></td>         </tr>          <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0 grp-hi_national_id_'+householdCount+'">        <label class="control-label mb-0" for="hi_national_id_'+householdCount+'">  National Identification Card Number   <i class="fa fa-info-circle hide" aria-hidden="true" title="State your national identification card number. Also select what proof you have for your national identification card. The document supplied must have the national identification number present."></i>        </label>    </div></td><td width="80%">    <div class="form-group mb-0 grp-hi_national_id_'+householdCount+'">        <input type="text" pattern="[0-9]{11}" maxlength="11" class="form-control" id="hi_national_id_'+householdCount+'" name="hi_national_id['+householdCount+']" aria-describedby="" value="" placeholder="xxxxxxxxxxx">  </div></td>         </tr>          <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0 grp-passport">        <label class="control-label mb-0" for="passport">  Relationship to Applicant <span class="red">*</span>   <i class="fa fa-info-circle hide" aria-hidden="true" title="Provide your national insurance number (passport) if applicable."></i>        </label>    </div></td><td width="80%">   <div class="form-group mb-0" id=""> <select class="form-control chosen-select hi_relationship" num="'+householdCount+'" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']"> <option disabled="" selected="">select...</option> @php $other = 'Other'; $otherid = ''; @endphp @foreach ($relationships as $relationship)   @if ($relationship->id !== 0)  @if ($relationship->relationship !== 'Other') <option value="{{$relationship->id}}">{{$relationship->relationship}}</option>     @else @php $other = $relationship->relationship; $otherid = $relationship->id; @endphp   @endif  @endif @endforeach <option value="{{$otherid}}">{{$other}}</option>        </select>        <input type="text" class="form-control hide" id="hi_relationship_other_'+householdCount+'" name="hi_relationship_other['+householdCount+']" aria-describedby="" value="" required maxlength="100" placeholder="Other relationship"> </div> </td>         </tr>     <tr><td class="table-active text-right align-middle" width="20%">    <div class="form-group mb-0 grp-passport">        <label class="control-label mb-0" for="passport">  Employment Status <span class="red">*</span>   <i class="fa fa-info-circle hide" aria-hidden="true" title="Provide your national insurance number (passport) if applicable."></i>        </label>    </div></td><td width="80%">    <div class="form-group grp-hi_emp_status_'+householdCount+'" id="">        <select class="form-control chosen-select hi_emp_status" num="'+householdCount+'" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']">  <option disabled="" selected="">select...</option>  @php $other = "Other"; $otherid = ""; @endphp  @foreach ($employment_status as $status)      @if ($status->status !== "Other")          <option  value="{{$status->id}}">{{$status->status}}</option>      @else          @php $other = $status->status; $otherid = $status->id; @endphp      @endif  @endforeach <option  value="{{$otherid}}">{{$other}}</option>        </select>        <input type="text" class="form-control hi_emp_status_other hide" id="hi_emp_status_other_'+householdCount+'" name="hi_emp_status_other['+householdCount+']" aria-describedby="" value="" required maxlength="100" placeholder="Other employment status"> </div></td>         </tr> </tbody> </table>       </div> ');

                // $('#household_tbody').append('<tr class="household_row" id="household_row_'+householdCount+'"><td>    <div class="form-group" id="" style="margin-bottom: 0;"><input type="text" class="form-control form-control-sm hi_name" count="'+householdCount+'" id="hi_first_name_'+householdCount+'" name="hi_first_name['+householdCount+']" aria-describedby="" required maxlength="100" placeholder="First Name"><span class="help-block"> </div> <div class="form-group" id="" style="margin-bottom: 0;"><input type="text" class="form-control form-control-sm hi_name" count="'+householdCount+'" id="hi_surname_'+householdCount+'" name="hi_surname['+householdCount+']" aria-describedby="" required maxlength="100" placeholder="Surname"><span class="help-block"> </div> </td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="M">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="F">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td> <td>    <div class="form-group" id=""> <select class="form-control form-control-sm chosen-select hi_relationship" num="'+householdCount+'" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']"> <option disabled="" selected="">select...</option> @php $other = 'Other'; $otherid = ''; @endphp @foreach ($relationships as $relationship)   @if ($relationship->id !== 0)  @if ($relationship->relationship !== 'Other') <option value="{{$relationship->id}}">{{$relationship->relationship}}</option>     @else @php $other = $relationship->relationship; $otherid = $relationship->id; @endphp   @endif  @endif @endforeach <option value="{{$otherid}}">{{$other}}</option>        </select>        <input type="text" class="form-control form-control-sm hide" id="hi_relationship_other_'+householdCount+'" name="hi_relationship_other['+householdCount+']" aria-describedby="" value="" required maxlength="100" placeholder="Other relationship"> <span class="help-block"> </div></td><td>    <div class="form-group" id=""><input type="text" class="form-control form-control-sm dob" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required placeholder="yyyy-mm-dd"><span class="help-block"> </div></td> <td>    <div class="form-group" id=""> <select class="form-control form-control-sm chosen-select hi_emp_status" num="'+householdCount+'" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']"> <option disabled="" selected="">select...</option> @php $other = 'Other'; $otherid = ''; @endphp @foreach ($employment_status as $status) @if ($status->status !== 'Other') <option value="{{$status->id}}">{{$status->status}}</option> @else @php $other = $status->status; $otherid = $status->id; @endphp @endif @endforeach <option value="{{$otherid}}">{{$other}}</option> </select> <input type="text" class="form-control form-control-sm hide" id="hi_emp_status_other_'+householdCount+'" name="hi_emp_status_other['+householdCount+']" aria-describedby="" value="" required maxlength="100" placeholder="Other employment status"> <span class="help-block"> </div></td><td>    <div class="form-group" id=""><input type="text" class="form-control form-control-sm" id="hi_national_id_'+householdCount+'" name="hi_national_id['+householdCount+']" aria-describedby="" required maxlength="11"><span class="help-block"> </div></td><td><button class="btn btn-sm btn-primary critical_del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');

                // add uploads row
                $('#uploads_tbody').append('<tr id="uploads_row_'+householdCount+'"> <td class=" table-active text-right align-middle" width="20%"> <div class="form-group mb-0" id="grp-proof_of_earnings_'+householdCount+'"> <label class="control-label mb-0" for="proof_of_earnings_'+householdCount+'"> Proof of Earnings for <span id="hi_name_'+householdCount+'_span"></span> <i class="fa fa-info-circle" aria-hidden="true" title="Proof of actual earnings must be submitted such as a payslip or job letter for employed household members."></i> </label> </div> </td> <td width="80%"> <div class="input-group mb-0"> <div class="custom-file"> <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_of_earnings_'+householdCount+'" name="proof_of_earnings['+householdCount+']" required> <label class="custom-file-label" for="proof_of_earnings_'+householdCount+'" id="proof_of_earnings_'+householdCount+'Label">Choose file</label> </div> </div><span class="help-block"> <strong id="err-proof_of_earnings_'+householdCount+'"></strong> </span> </td> </tr>');

                // increment count
                $('html, body').animate({scrollTop: $('#household_row_'+householdCount).offset().top -100 }, 'slow');
                setTimeout(() => {
                    // increment count
                    householdCount++;
                }, 100);
                
                dob();
                countHousehold();
            }
        });
        
        // delete household income row
        $(document).on('click', '.critical_del_household', function() {
            var num = $(this).attr('num');
            var chk = confirm('Remove Person #' + num+ '?');
            if (chk) {
                $('#household_row_'+num).remove();
                $('#uploads_row_'+num).remove();
                countHousehold();
                school_supplies();
            }
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

        // count travel party
        function countHousehold() {
            var count = $('.critical_household_row').length;
            if (count == 1) {
                $('#hi_count').html('1 Person');
            } else {
                $('#hi_count').html(count + ' Persons');
            }
        }
        
    });
</script>

@endsection