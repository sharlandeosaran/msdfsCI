<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
</head>
<body>
    <div id="app">
        <div class="container-fluid down-20">
            @yield('content')
            <h3>{{$name}},</h3>
            <p>The email function works.</p>
            <p>Stay tuned for email notifications,<br>coming to email enabled devices near you!</p>
            <p>{{$data->activity}}</p>
            <a href="{{url('/')}}/assignment/view/{{$data->id}}"><h3>{{$data->activity}}</h3></a>

        </div>
        <hr>
        
        <div class="footer">
            <footer class="footer-demo section-dark">
                <div class="container-fluid">
                    <div class="copyright text-center">
                        © {{date('Y')}} {{ config('app.name', 'iTool') }}
                    </div>
                    <div class="col-md-12"><img class="img-responsive center-block" src="{{asset('/img/logo_email.png')}}" style="width:100%; max-width:200px;"></div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
