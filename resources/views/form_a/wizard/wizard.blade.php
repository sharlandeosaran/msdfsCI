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
                
                @include('form_a.wizard.section1')
                @include('form_a.wizard.section2')
                @include('form_a.wizard.section3')
                @include('form_a.wizard.section4')
                @include('form_a.wizard.review')
                @include('form_a.wizard.submit')
                
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
        @if (!session('success') && count($errors) <= 0)
            $('#name').focus();
        @endif
        
        
    });
</script>

@endsection