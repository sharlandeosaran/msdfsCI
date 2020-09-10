@extends('layouts.tntbg.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="row">
            <div class=" col-xs-10 offset-xs-1 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <img class="img-responsive center-block" src="{{asset('/img/msdfs_logo.png')}}" style="width:100%;">
            </div>
        </div>
    </div>
</div>

<div class="container">
    
    <div class="row justify-content-center">
        <div class="row mx-2 mt-3">
            <div class="col-xs-8 offset-xs-2 col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center">
                <h2>
                    @if(session('success'))
                    <div class="alert alert-success text-center">
                        <h4><i class="fa fa-check-circle" aria-hidden="true"></i> {!! session('success') !!}</h4>
                    </div>
                    @else
                    <div class="alert alert-success text-center">
                        <h4><i class="fa fa-check-circle" aria-hidden="true"></i> ** message **</h4>
                    </div>
                    @endif
                </h2>
                @if(session('reference_number'))
                <h2><strong>
                    Reference Number: <br>
                    {!! session('reference_number') !!}
                </strong></h2>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="mt-2" style="position: relative; z-index: 2;">
    <p class="pt-2 text-center">
        <a href="{{url('/')}}" class="btn btn-primary btn-lg"><i class="fa fa-home"></i> home</a>
    </p>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function(){

    });
</script>
@endsection
