<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(isset($title))
        {{ $title }}
        @else
        {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <style>
        .invoice-box{
            /*max-width:800px;*/
            margin:auto;
            padding:20px;
            /*border:1px solid #eee;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);*/
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }
        
        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }
        
        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }
        
        .invoice-box table tr td:nth-child(2){
            /* text-align:right; */
        }
        
        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }
        
        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }
        
        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }
        
        .invoice-box table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }
        
        .invoice-box table tr.details td{
            padding-bottom:20px;
        }
        
        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }
        
        .invoice-box table tr.item.last td{
            border-bottom:none;
        }
        
        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }
        
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }
            
            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }
        
        .text-justify {
            text-align: justify !important;
        }
        
        .invoice-box{
            margin:auto;
            padding:12px;
            font-size:16px;
            line-height:20px;
            font-family:"Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            color:#555;
        }

        .invoice-box .details{
            line-height:15px;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }

        .text-right{
            text-align:right;
        }

        .text-left{
            text-align:left;
        }

        .text-center{
            text-align:center;
        }

        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:40px;
            line-height:40px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        table tr.details td{
            padding-bottom:5px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        .text-danger, .text-danger:hover {
            color: #B33C12;
        }

        h3 {
            margin: 0;
        }

        tr.line td {
            border-bottom:1px solid #eee;
        }

        tr.line th {
            border-bottom:2px solid #000;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            border-top:1px solid #eee;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }

        .new-page {
            page-break-before: always;
        }

        .red {color:red !important;}

        .bold {
            font-weight: bold;
            /* font-size: large; */
        }

        .bold > td {
            padding: 10px 5px !important;
        }
        
        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
            background-color: #d2d6de !important;
            color: #444;
        }
    </style>
</head>
<body>
    @yield('content')
    @yield('footer')
</body>
</html>
