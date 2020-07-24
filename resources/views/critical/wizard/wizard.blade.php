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
                @include('common.wizard.household_info')
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
        
        // show/hide recovery_needs_input_group once damage household item is selected
        $(document).on('change', '.household_damage_items', function() {
            var boxes = $('.household_damage_items:checkbox:checked');

            if (boxes.length > 0) {
                $('.recovery_needs_div').addClass('hide');
                boxes.each(function( index ) {
                    $('#recovery_needs_'+ $( this ).prop('id')).removeClass('hide');
                });
            } else {
                $('.recovery_needs_div').addClass('hide');
            }
        });
        
        // show/hide disaster remarks
        $(document).on('change', '.disasters', function() {
            var boxes = $('.disasters:checkbox:checked');
            var id = $( this ).prop('id');

            if (boxes.length > 0) {
                $('.disaster_remarks_div').addClass('hide');
                boxes.each(function( index ) {
                    $('#disaster_remarks_'+ $( this ).prop('id')).removeClass('hide');
                });
                $('#disaster_remarks_input_'+ id).focus();
            } else {
                $('.disaster_remarks_div').addClass('hide');
            }
        });
        
        // show/hide housing repairs required
        $(document).on('change', '[name = "housing_damage"]', function() {
            var val = $(this).val();
            console.log(val);

            if (val == 'yes') {
                $('#housing_repairs_div').removeClass('hide');
                $('#housing_repairs').focus();
            } else {
                $('#housing_repairs_div').addClass('hide');
            }
        });

        // change classification of applicant after entered
        $(document).on('change', '#employment_classification', function(){
            $('#hi_emp_classification').val($(this).val());
        });
        
    });
</script>

@endsection