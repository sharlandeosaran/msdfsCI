<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="{{url('/img/favicon.png')}}" />

  <title>
      @if(isset($title))
      {{ config('app.name', 'Laravel') }} | {{ $title }}
      @else
      {{ config('app.name', 'Laravel') }}
      @endif
  </title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Styles -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/admin/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/styles.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/admin/skins/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <style>
        .modal-xl {
            width: 90%;
        }
        
        .loading {
            width: 150px !important;
            margin: 20% auto !important;
        }
        
        .loading > .modal-content {
            background-color: rgba(255, 255, 255, 0) !important;
            border: 0 !important;
        }
        
        .loading > .modal-content > .modal-body {
            padding: 20px;
        }
    </style>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  @include('layouts.analytics')
</head>
<body class="">
<div class="">

  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    
    <!-- Main content -->
    @yield('content')
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

@include('common.loading_modal')

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/admin/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
{{-- <script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('js/admin/pages/dashboard2.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('js/admin/demo.js') }}"></script> --}}

{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
@yield('scripts')

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        
        $('form').submit(function(){
            var id = $(this).prop('id');
            if (id == 'searchForm' && !$('#searchString').val()) {
                return false;
            }

            $(':submit, a[href="#finish"]').html("<i class='fa fa-spinner fa-pulse fa-fw'></i>").addClass('disabled').prop('disabled', true);
            $('#loadingModal').modal('show');
        });
        
        /* function searchChk(){
            var val = ;
            alert(val)
            if(!val || val == '') {
                setTimeout(function(){ $(':submit').button('reset'); }, 10);
            }else{
                $('#loadingModal').modal('show');
            }
        } */
    });

    function formatDate(date) {
        var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
        
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        
        return [year, month, day].join('-');
    }
</script>

</body>
</html>
