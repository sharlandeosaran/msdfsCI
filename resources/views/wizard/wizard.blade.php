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
            
            @include('wizard.section1')
            @include('wizard.section2')
            @include('wizard.submit')

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
            stepsOrientation: "vertical",
            titleTemplate: '<span class="number">#title#</span>'
        });
        
        
    });
</script>

@endsection