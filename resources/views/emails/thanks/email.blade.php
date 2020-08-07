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

        p{
            text-align: justify;
        }

        strong {
            font-size: larger;
            text-align: left !important;
        }
        
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .text {
                /* position: absolute;
                top: 110px; */
                padding: 0 10%;
                font-size: 1em;
            }
        }
        
        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .text {
                /* position: absolute;
                top: 170px; */
                padding: 0 10%;
                font-size: 1.5em;
            }
        }
        
        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .text {
                /* position: absolute;
                top: 200px; */
                padding: 0 10%;
                font-size: 1.7em;
            }
        } 
        
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .text {
                /* position: absolute;
                top: 220px; */
                padding: 0 10%;
                font-size: 1.8em;
            }
        } 
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .text {
                /* position: absolute;
                top: 260px; */
                padding: 0 10%;
                font-size: 1.8em;
            }
        }
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1400px) {
            .text {
                /* position: absolute;
                top: 320px; */
                padding: 0 10%;
                font-size: 1.9em;
            }
        }
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1600px) {
            .text {
                /* position: absolute;
                top: 360px; */
                padding: 0 10%;
                font-size: 2em;
            }
        }
        
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1900px) {
            .text {
                /* position: absolute;
                top: 380px; */
                padding: 0 10%;
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="col-md-12">
                <img class="img-responsive center-block" src="{{asset('/img/email/thanks_letter_top.jpg')}}" style="width:100%;">
                {{-- <img class="img-responsive center-block" src="{{$message->embed(asset('/img/email/thanks_letter.jpg'))}}" style="width:100%;"> --}}
                <p class="text">
                    <strong>Dear {{$data->name}}</strong>,
                    <br><br>
                    We wish to take this opportunity to acknowledge receipt of your submission(s) to the Roadmap to Recovery Initiative and to most sincerely thank you for taking the time to contribute to this national effort.
                    <br><br>
                    We wish to assure you that all submissions are being carefully considered by the relevant subcommittee(s) assigned to address the areas(s) covered in your submissions(s) as they strive to craft options that will aid in supporting the most vulnerable among us and restarting and revitalising the economy in the first instance, and thereafter in creating a stronger more resilient people and country post COVID-19.
                    <br><br>
                    These times are unprecedented, and it is imperative that we come out of them better than we were before to solidify our place in the new global environment.
                    <br><br>
                    With your help, we can create a better Trinidad and Tobago for generations to come.
                    <br><br>
                    Again, thank you and we look forward to your continued participation in this critical initiative.
                    <br><br>
                    Sincerely,<br>
                    <strong>
                        The Minister of Public Administration<br>
                        the Honourable Allyson West
                    </strong><br>
                    Co-Vice Chair of the Committee
                    
                </p>
                <img class="img-responsive center-block" src="{{asset('/img/email/thanks_letter_bottom.jpg')}}" style="width:100%;">
            </div>
             
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
