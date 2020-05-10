@extends('layouts.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>
</ol>
@endsection

@section('content')

<main class="align-items-center">
    <div class="container">
        <div id="wizard">
            
            @include('form_a.wizard.section1')
            @include('form_a.wizard.section2')
            @include('form_a.wizard.section3')
            @include('form_a.wizard.section4')
            @include('form_a.wizard.review')
            @include('form_a.wizard.submit')

        </div>
    </div>
</main>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        // initialize wizard
        $("#wizard").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "none",
            stepsOrientation: "horizontal",
            titleTemplate: '<span class="number">#title#</span>'
        });
        
        
    });
</script>

@endsection