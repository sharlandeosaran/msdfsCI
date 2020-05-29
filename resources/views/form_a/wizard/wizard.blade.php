@extends('layouts.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>
</ol>
@endsection

@section('content')
<link href="{{ asset('css/chosen/chosen.min.css') }}" rel="stylesheet">
@include('common.errors')

<main class="align-items-center">
    <div class="">
        
        <form id="forma" method="POST" action="{{route('formapost')}}" enctype="multipart/form-data" role="form">
            @csrf
            
            <div id="wizard">
                
                @include('form_a.wizard.guidelines')
                @include('common.wizard.general_info')
                @include('form_a.wizard.employer_info')
                @include('common.wizard.household_info')
                @include('common.wizard.uploads')
                @include('form_a.wizard.submit')
                
            </div>
        </form>
    </div>
</main>

@endsection

@section('scripts')

<script src="{{ asset('plugins/validate/jquery.validate.js') }}"></script>
{{-- <script src="{{ asset('plugins/validate/jquery.maskedinput.js') }}"></script> --}}
<script src="{{ asset('js/wizard_validation_form_a.js') }}"></script>


<script>
    $(document).ready(function(){
        @include('common.wizard.script')

        $('#employerInfoSection').html('2');
        $('#householdInfoSection').html('3');
        $('#uploadsSection').html('4');
        
        // $("input.phone").mask("(999) 999-9999");
        
        // $('.chosen-select').chosen();

        // var config = {
        //     '.chosen-select'           : {},
        //     '.chosen-select-deselect'  : { allow_single_deselect: true },
        //     '.chosen-select-no-single' : { disable_search_threshold: 10 },
        //     '.chosen-select-no-results': { no_results_text: 'Oops, nothing found!' },
        //     '.chosen-select-rtl'       : { rtl: true },
        //     '.chosen-select-width'     : { width: '95%' }
        // }
        // for (var selector in config) {
        //     $(selector).chosen(config[selector]);
        // }
    });
</script>

@endsection