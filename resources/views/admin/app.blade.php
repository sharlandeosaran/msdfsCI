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

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  @include('layouts.analytics')
</head>
<body class="sidebar-mini skin-red fixed">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset('img/TTCrest.png')}}" alt=""></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset('img/TTCrest.png')}}" alt=""></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      @auth
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('img/avatar.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('img/avatar.png') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{Auth::user()->admin? 'Administrator' : 'General User'}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              {{-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> --}}
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>
      </div>
      @endauth

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @if(isset($title)) {{ $title }} @endif
      </h1>
      @yield('breadcrumbs')
    </section>

    {{-- session message --}}
    @if(session('flashed'))
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4><i class="fa fa-warning" aria-hidden="true"></i> {{session('flashed')}}</h4>
        </div>
    </div>
    @endif
    
    <!-- Main content -->
    @yield('content')
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="copyright" style="min-height: 20px;">
      <div class="col-md-4">
        Email <a href="mailto:{{support_email()}}" style="color: #D9534F; text-decoration: underline;">{{support_email()}}</a> for support.
      </div>
      <div class="col-md-4 text-center">
        {{version()}}
      </div>
      <div class="col-md-4">
        <img src="{{asset('/img/igovtt_powered_black.png')}}" alt="Powered by iGovTT" height="25px" class="pull-right">
      </div>
    </div>
  </footer>

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
<!-- Notify.js -->
<script src="{{ asset('js/admin/notify.min.js') }}"></script>
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

        @if(session('success'))
            success("{{session('success')}}");
        @endif
    });

    function success(msg) {
        $.notify(
            msg, 
            { 
                position:"top center",
                className: "success", 
                showDuration: 500,
            }
        );
    }

    function failure(msg) {
        $.notify(
            msg, 
            { 
                position:"top center",
                className: "error", 
                showDuration: 500,
            }
        );
    }

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
