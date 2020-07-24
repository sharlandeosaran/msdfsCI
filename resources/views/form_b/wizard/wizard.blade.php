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
        
        <form id="formb" method="POST" action="{{route('formbpost')}}" enctype="multipart/form-data" role="form">
            @csrf
            
            <div id="wizard">
                
                @include('form_b.wizard.guidelines')
                @include('common.wizard.general_info')
                @include('common.wizard.household_info')
                @include('form_b.wizard.recommender')
                @include('common.wizard.uploads')
                @include('form_b.wizard.submit')
                
            </div>
        </form>
    </div>
</main>

@endsection

@section('scripts')
<script src="{{ asset('js/wizard_validation_form_b.js') }}" defer></script>

<script>
    $(document).ready(function(){
        @include('common.wizard.script')
        
        $('#householdInfoSection').html('2');
        $('#uploadsSection').html('4');

        $('.self-employed').removeClass('hide');

        // recommender help based on selection
        var titles = {!! json_encode($job_title) !!};
        $(document).on('change', '#recommender_job_title', function() {
            var key = $(this).children("option:selected").attr('num');

            if (titles[key]['label']) {
                $('#recommender_job_title_info_row').removeClass('hide');
                $('#recommender_job_title_label').html(titles[key]['label']);
                $('#recommender_job_title_help').prop('title', titles[key]['help']);
            } else {
                $('#recommender_job_title_info_row').addClass('hide');
            }
        });
    });
</script>

@endsection