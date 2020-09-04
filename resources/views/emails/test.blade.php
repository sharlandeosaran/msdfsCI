<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
</head>
<body>
    <div id="app">
        <h3>Test</h3>
        <p>This is a test email.</p>
        
    </div>
    <hr>
    
    <div class="footer">
        <footer class="footer-demo section-dark">
            <div class="container-fluid">
                <div class="copyright text-center">
                    © {{date('Y')}} {{ config('app.name', 'iTool') }}
                </div>
                <div class="col-md-12"><img class="img-responsive center-block" src="{{asset('/img/msdfs_logo.png')}}" style="width:100%; max-width:200px;"></div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>