@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li class="active">Dashboard</li>
</ol>
@endsection

@section('content')
<section class="content">

    @cannot('admin')
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" id="submissionsGo">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fas fa-plane-arrival"></i></span>
                        
                        <div class="info-box-content">
                            <span class="info-box-text">Inbound Requests</span>
                            <span class="info-box-number">{{$feedback_count}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                
                {{-- <form id="submissionForm" method="POST" action="{{route('reportbycategorypost')}}" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" id="categories" name="categories" value="{!!json_encode($cats)!!}">
                </form> --}}
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" id="commentsGo">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fas fa-plane-departure"></i></span>
                        
                        <div class="info-box-content">
                            <span class="info-box-text">Outbound Requests</span>
                            <span class="info-box-number">{{$comments}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                
                {{-- <form id="commentsForm" method="POST" action="{{route('commentbycategorypost')}}" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" id="categories" name="categories" value="{!!json_encode($cats)!!}">
                </form> --}}
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow">
                        {{-- <i class="ion ion-ios-people-outline"></i> --}}
                    </span>
                    
                    <div class="info-box-content">
                        {{-- <span class="info-box-text">Unique Persons</span>
                        <span class="info-box-number">{{$unique_persons}}</span> --}}
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green">
                        {{-- <i class="fa fa-building-o" aria-hidden="true"></i> --}}
                    </span>
                    
                    <div class="info-box-content">
                        {{-- <span class="info-box-text">Organizations</span>
                        <span class="info-box-number">{{$organizations}}</span> --}}
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- HORIZONTAL BAR CHART -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Application Priorities</h3>
                        
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="horBar" style="height:300px"></canvas>
                            {{-- <canvas id="stackedBard" style="height:230px"></canvas> --}}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    @endcannot

    @can('admin')
        
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-users" aria-hidden="true"></i></span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{$users}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text">Inactive Users</span>
                        <span class="info-box-number">{{$inactiveusers}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text">Email Logs</span>
                        <span class="info-box-number">{{$emaillogs}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                    
                    <div class="info-box-content">
                        <span class="info-box-text">User Logs</span>
                        <span class="info-box-number">{{$userlogs}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        
        <!-- HORIZONTAL BAR CHART -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Errors Logged | Last 2 Weeks By Day</h3>
                        
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="adminChart" style="height:300px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    @endcan
    
    <!-- BAR CHART -->
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Submission By Organization | Last Week</h3>
                    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="stackedBard" style="height:230px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div> --}}

</section>
@endsection

@section('scripts')
<script src="{{ asset('plugins/Chart.js-2.9.3/Chart.min.js') }}"></script>
<script>
    
    @cannot('admin')
    // submit forms
    $('#submissionsGo').click(function() {
        $('#submissionForm').submit();
    })
    $('#commentsGo').click(function() {
        $('#commentsForm').submit();
    })

    // horizontal bars - Submission By Category
    var horBar = document.getElementById('horBar');
    var horbarChartData                     = {
        labels  : [
            @foreach ($categories as $cat)
            '{!! $cat->category !!}',
            @endforeach
        ],
        datasets: [
            {
                label               : 'Count',
                data                : [
                                        @foreach ($categories as $cat)
                                            {{number_format($cat->count)}},
                                        @endforeach
                                    ],
                backgroundColor     : 'rgba(153, 102, 255, 0.2)',
                borderColor         : 'rgba(153, 102, 255, 1)',
                borderWidth         : 1
            }
        ]
    }
    var myBarChart = new Chart(horBar, {
        type: 'horizontalBar',
        data: horbarChartData,
        options: {
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false,
            }
        }
    });
    @endcannot

    @can('admin')
    // stacked bars
    var ctx = document.getElementById('adminChart');
    var barChartData                     = {
        labels  : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        datasets: [
        {
            label               : 'Last Week',
            data                : [
                @if(isset($errors['last']))
                @foreach ($errors['last'] as $item)
                    {{$item}},
                @endforeach
                @endif
            ],
            backgroundColor     : 'rgba(54, 162, 235, 0.2)',
            borderColor         : 'rgba(54, 162, 235, 1)',
            borderWidth         : 1
        },
        {
            label               : 'This Week',
            data                : [
                @if(isset($errors['this']))
                @foreach ($errors['this'] as $item)
                    {{$item}},
                @endforeach
                @endif
            ],
            backgroundColor     : 'rgba(255, 99, 132, 0.2)',
            borderColor         : 'rgba(255, 99, 132, 1)',
            borderWidth         : 1
        }
        ]
    }
    var stackedBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            scales: {
                xAxes: [{
                    // stacked: true
                }],
                yAxes: [{
                    // stacked: true
                }]
            }
        }
    });
    @endcan
</script>
@endsection