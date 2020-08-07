<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
</head>
<body>
    <div id="app">
        <div class="container-fluid down-20">
            <h3>{{$data->name}},</h3>
            <p>Your password has been reset.</p>
            <p>You can access the system <a href="{{url('/admin')}}">here</a> with the following credentials:</p>

            <p>
                u- {{$data->email}} <br>
                p- password
            </p>

        </div>
        <hr>
        
        <div class="footer">
            <footer class="footer-demo section-dark">
                <div class="container-fluid">
                    <p><strong><small><i>*** This is an automatically generated email, please do not reply ***</i></small></strong></p>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
