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
        
        <form id="forma" method="POST" action="{{route('formapost')}}" enctype="multipart/form-data" role="form">
            @csrf
            
            <div id="wizard">
                
                @include('form_a.wizard.guidelines')
                @include('common.wizard.employee_info')
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
<script src="{{ asset('js/wizard_validation_form_a.js') }}" defer></script>

<script>
    $(document).ready(function(){
        @include('common.wizard.script')

        $('#employerInfoSection').html('2');
        $('#householdInfoSection').html('3');
        $('#uploadsSection').html('4');
        
    });
</script>

@endsection