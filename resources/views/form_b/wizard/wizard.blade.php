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
    });
</script>

@endsection