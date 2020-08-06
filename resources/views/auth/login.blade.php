<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{url('/img/TTCrest.png')}}" />
	<link rel="apple-touch-icon" href="{{url('/apple-touch-icon.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>{{ config('app.name', 'Laravel') }}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">

    @include('layouts.analytics')
      
</head>
<body>
    
    <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container" style="margin-top: 5%;">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Welcome</h3>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                
                                    @if ($errors->has('email'))
                                    <div class="alert text-center">
                                        <strong><small>{{ $errors->first('email') }}</small></strong>
                                    </div>
                                    @endif
                                    
                                    @if(session('inactive'))
                                    <div class="alert text-center">
                                        <strong><small>{!! session('inactive') !!}</small></strong>
                                    </div>
                                    @endif

                                    <label>{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    <label>{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong><small>{{ $errors->first('password') }}</small></strong>
                                    </span>
                                    @endif

                                    <button class="btn btn-danger btn-block"  data-loading-text='<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>'>Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>

                                    
                                </form>
                                {{-- <div class="forgot">
                                    <a href="#" class="btn btn-simple btn-danger">Forgot password?</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>     
            <div class="footer register-footer text-center">
                    <h6>&copy; {{date('Y')}} {{ config('app.name', 'Laravel') }}.  All Rights Reserved.</h6>
                    {{-- <h6>Email <a href="mailto:{{support_email()}}" style="color: #ffffff; text-decoration: underline;">{{support_email()}}</a> for support. {{version()}}</h6> --}}
                    <img src="{{asset('/img/igovtt_powered_white.png')}}" alt="Powered by iGovTT" height="25px">

            </div>
        </div>
    </div>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $('form').submit(function(){
            $(':submit').button('loading');
        });
    </script>

</body>
    
</html>