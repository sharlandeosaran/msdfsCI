<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    
    <style>
        /* .text {
            position: absolute;
            top: 30%;
            padding: 0 10%;
        } */
        
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
        
        p {
            text-align: justify;
        }

        ul {
            margin-left: 40px;
        }
        
        /* strong {
            font-size: larger;
            text-align: left !important;
        } */
        
        table {
            border-collapse: collapse;
        }
        
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        
        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #bfbfbf;
            /* color: white; */
        }
        
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .text {
                /* position: absolute;
                top: 110px;
                padding: 0 10%; */
                font-size: 1em;
            }
        }
        
        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .text {
                /* position: absolute;
                top: 170px;
                padding: 0 10%; */
                font-size: 1.5em;
            }
        }
        
        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .text {
                /* position: absolute;
                top: 200px;
                padding: 0 10%; */
                font-size: 1.7em;
            }
        } 
        
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .text {
                /* position: absolute;
                top: 220px;
                padding: 0 10%; */
                font-size: 1.8em;
            }
        } 
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .text {
                /* position: absolute;
                top: 260px;
                padding: 0 10%; */
                font-size: 1.8em;
            }
        }
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1400px) {
            .text {
                /* position: absolute;
                top: 320px;
                padding: 0 10%; */
                font-size: 1.9em;
            }
        }
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1600px) {
            .text {
                /* position: absolute;
                top: 360px;
                padding: 0 10%; */
                font-size: 2em;
            }
        }
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1900px) {
            .text {
                /* position: absolute;
                top: 380px;
                padding: 0 10%; */
                font-size: 2em;
            }
        }

        #app {
            padding: 0 5%;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="col-md-12">
                
                <img class="img-responsive center-block" src="{{asset('/img/email/letterhead_top.png')}}" style="width:100%;">
                
                @yield('content')
                
            </div>
            
        </div>
        <hr>

        <div class="footer">
            <footer class="footer-demo section-dark">
                <div class="container-fluid">
                    <div class="copyright text-center">
                        © {{date('Y')}} {{ config('app.name') }}
                    </div>
                    <div class="col-md-12"><img class="img-responsive center-block" src="{{asset('/img/email/msdfs_logo.png')}}" style="width:100%; max-width:150px;"></div>
                </div>
                <div class="container-fluid">
                    <p><strong><small><i>*** This is an automatically generated email, please do not reply ***</i></small></strong></p>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
