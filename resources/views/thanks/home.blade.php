@extends('layouts.tntbg.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
        <div class="row">
            {{-- only on xs --}}
            <div class="col-md-8 offset-md-2 text-center d-block d-sm-none mt-5">
                <img src="{{asset('img/thank_you.png')}}" alt="Butterflies" class="img-responsive mt-5" width="100%">
                {{-- <h3>Check your email for acknowledgement.</h3> --}}
            </div>
            
            {{-- only on sm --}}
            <div class="col-md-8 offset-md-2 text-center d-none d-sm-block d-md-none" style="margin-top: -35px;">
                <img src="{{asset('img/thank_you.png')}}" alt="Butterflies" class="img-responsive mt-0" width="100%">
                {{-- <h3>Check your email for acknowledgement.</h3> --}}
            </div>
            
            {{-- md and bigger --}}
            <div class="col-md-8 offset-md-2 text-center d-none d-md-block mt-1">
                <img src="{{asset('img/thank_you.png')}}" alt="Butterflies" class="img-responsive mb-4" width="100%">
                {{-- <h3>Check your email for acknowledgement.</h3> --}}
            </div>
        </div>

        <div class="row mx-2 mt-3">
            <div class="col-xs-8 offset-xs-2 col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center">
                <h2>
                    ** Success message **.</h2>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function(){

    });
</script>
@endsection
