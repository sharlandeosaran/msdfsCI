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
    <div class="container">
        
        <form id="formb" method="POST" action="{{route('formbpost')}}" enctype="multipart/form-data" role="form">
            @csrf
            
            <div id="wizard">
                
                @include('form_b.wizard.guidelines')
                @include('form_b.wizard.section1')
                @include('form_b.wizard.section2')
                @include('form_b.wizard.section3')
                @include('form_b.wizard.section4')
                @include('form_b.wizard.submit')
                
            </div>
            
        </form>
    </div>
</main>

@endsection

@section('scripts')
<script src="{{ asset('js/wizard_validation.js') }}" defer></script>

<script>
    $(document).ready(function(){

        // unlock tabs if return with errors
        @if (count($errors) > 0)
        $('li[role="tab"]').removeClass('disabled').addClass('done');
        @endif

        // focus on name when page loads
        // @if (!session('success') && count($errors) <= 0)
        //     $('#name').focus();
        // @endif

        // add household income row
        var householdCount = 2;
        $(document).on('click', '.add_household', function() {
            $('#household_tbody').append('<tr id="household_row_'+householdCount+'"><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_name_'+householdCount+'" name="hi_name['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="male">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="female">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm hi_income" id="hi_income_'+householdCount+'" name="hi_income['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td><button class="btn btn-sm btn-primary del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');
            householdCount++;
        });

        // delete household income row
        $(document).on('click', '.del_household', function() {
            var num = $(this).attr('num');
            $('#household_row_'+num).remove();
            hiTotal();
        });

        // sum total income
        $(document).on('change', '.hi_income', function() {
            hiTotal();
        });

        // calculate total income
        function hiTotal() {
            var total = 0;
            $('.hi_income').each(function(i, e){
                if(e.value > 0) total += parseFloat(e.value);
            });
            $('#hi_total_income').val(total.toFixed(2));
        }
        
    });
</script>

@endsection