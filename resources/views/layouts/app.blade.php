<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{url('/img/TTCrest.png')}}" />

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
    <div id="app">
        @include('layouts.navbar')
        
        <div class="container">
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

    @yield('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        $(function () {      
            $('[data-toggle="tooltip"]').tooltip()
            
            $("input.phone").mask("(999) 999-9999");
                  
            $('form').submit(function(){
                $(':submit, a[href="#finish"]').html('loading...').addClass('disabled').prop('disabled', true);
                $('#loadingModal').modal('show');
            });
        });
    </script>
</body>
</html>
