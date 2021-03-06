<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{url('/img/favicon.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(isset($title))
            {{ $title }}
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('layouts.analytics')
</head>
<body>
    <div id="overlay">
        <div class="modal-dialog loading" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-primary"></i>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    
    <div id="app">
        @include('layouts.navbar')
        
        <div class="container-fluid">
            @yield('breadcrumbs')
            
            <main>
                @yield('content')
            </main>
        </div>

        @include('layouts.footer')
    </div>
    
    @include('common.loading_modal')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <script>
        // add household income rows
        var householdCount = {{count($errors)}} + 2;
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')

    <script>

        $(function () {  
            $('#overlay').fadeOut();

            $('[data-toggle="tooltip"]').tooltip()
                  
            $('form').submit(function(){
                $(':submit, a[href="#finish"]').html('loading...').addClass('disabled').prop('disabled', true);
                $('#loadingModal').modal('show');
            });
            
            $(document).on('click', 'a[href="#finish"]', function() {
                var $myForm = $('form');
                // alert($myForm[0].checkValidity());
                
                // if($myForm[0].checkValidity()) {
                    $('form').submit();
                // }else{
                //     // display errors
                //     alert('There are errors in the form.');
                // }
            });
        });
    </script>

    {{-- Google reCAPTCHA --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.key', '') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('captcha.key', '') }}', {action: 'submit'}).then(function(token) {
                $('#grecaptcha').val(token);
            });
        });
    </script>
</body>
</html>
