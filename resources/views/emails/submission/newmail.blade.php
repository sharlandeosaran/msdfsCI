<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">

    <style>
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #000000;
            color: white;
        }

        table td.head {
            background-color: #F8D7D5;
            font-weight: bold;
            text-align: right;
        }

        h1 {
            color: #000000;
        }

        a {
            color: #000000;
            font-weight: bold;
            text-decoration: none;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="col-md-12"><img class="img-responsive center-block" src="{{$message->embed(asset('/img/email/acknowledgement.jpg'))}}" style="width:100%;"></div>
             
        </div>
        <hr>
        
        <div class="footer">
            <footer class="footer-demo section-dark">
                <div class="container-fluid">
                    <p><strong><small><i>*** This is an automatically generated email, please do not reply ***</i></small></strong></p>
                    {{-- <div class="col-md-12"><img class="img-responsive center-block" src="{{$message->embed(asset('/img/logo_email.png'))}}" style="width:100%; max-width:200px;"></div> --}}
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
