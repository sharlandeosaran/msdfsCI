@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('reports')}}">Submission Reports</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')

<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    @include('common.errors')
                </div>
                <div class="box-body">
                    <form id="form" method="POST" action="{{route('reportbydatepost')}}" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" id="startInput" name="startInput">
                        <input type="hidden" id="endInput" name="endInput">
                        <input type="hidden" id="range" name="range">
                    
                        <!-- Date and time range -->
                        <div class="form-group ">
                            <label>Select Date Range:</label>
                            
                            <div class="input-group" style="display:block">
                                <button type="button" class="btn btn-default" id="daterange-btn">
                                    <span>
                                        <i class="fa fa-calendar"></i> Date range
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                            
                            <button type="submit" id="submitBtn" class="btn btn-danger" style="margin-top:10px"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>

                        </div>
                        <!-- /.form group -->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function () {
        // set to today
        setdate(moment(), moment());
        
        //Date range as a button
        $('#daterange-btn').daterangepicker(
        {
            ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            // startDate: moment().subtract(29, 'days'),
            // endDate  : moment()
        },
        function (start, end) {
            setdate(start, end);
        }
        )

        function setdate(start, end) {
            var range = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');
            $('#daterange-btn span').html('<i class="fa fa-calendar"></i> '+range);
            $('#startInput').val(start.format('YYYY-MM-DD'));
            $('#endInput').val(end.format('YYYY-MM-DD'));
            $('#range').val(range);
        }

        //Date picker
        $('#datepicker').datepicker({
        autoclose: true
        })

        $("form").submit(function(event) {
            
            var startInput = $("#startInput").val();
            var endInput = $("#endInput").val();

            if (!startInput || !endInput) {
                event.preventDefault();
                alert("Please select date range for report.");
                setTimeout(function(){ $(':submit').html('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate').removeClass('disabled').prop('disabled', false);}, 10);
            }
        });
    })
</script>
@endsection