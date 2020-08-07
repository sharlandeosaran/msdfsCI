@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{route('reports')}}">Submission Reports</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form id="form" method="POST" action="{{route('commentbystatuspost')}}" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" id="status" name="status">
                    
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center checkboxAllRow" style="width: 60px; vertical-align: middle;" id="checkboxAllRow">
                                            <h3 style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-square-o checkboxes checkboxAll" aria-hidden="true" id="checkboxAll"></i></h3>
                                        </th>
                                        <th>
                                            <h3>
                                                Status
                                                <small>
                                                    
                                                    
                                                    <button type="submit" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
                                                </small>
                                            </h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($status as $item)
                                    <tr id="tableRow{{$item->id}}" class=" checkboxRow" catId="{{$item->id}}">
                                        <td class="text-center" catId="{{$item->id}}">
                                            <h3 style="margin-top: 10px;"><i class="fa fa-square-o checkboxes" catId="{{$item->id}}" aria-hidden="true" id="checkbox{{$item->id}}"></i></h3>
                                        </td>
                                        <td><h4>{{$item->status}}</h4></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th class="text-center checkboxAllRow" style="width: 60px; vertical-align: middle;" id="checkboxAllRow">
                                            <h3 style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-square-o checkboxes checkboxAll" aria-hidden="true" id="checkboxAll"></i></h3>
                                        </th>
                                        <th>
                                            <h3>
                                                Status
                                                <small>
                                                    
                                                    
                                                    <button type="submit" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
                                                </small>
                                            </h3>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var stats = [];
    var allStats = {!! json_encode($status->pluck('id')->toJson()) !!};

    $('.checkboxRow').on('click', function() {
        var id = $(this).attr('catId');
        if ($('#checkbox'+id).hasClass('fa-square-o')) {
            $('#checkbox'+id).removeClass('fa-square-o').addClass('fa-square');
            stats.push(id);
        } else {
            $('.checkboxAll, #checkbox'+id).addClass('fa-square-o').removeClass('fa-square');
            removeValueFromArray(id);          
        }
        $('#status').val(stats);
        // console.log(stats);
    });
    
    $('.checkboxAllRow').on('click', function() {
        if ($('.checkboxAll').hasClass('fa-square-o')) {
            $('.checkboxes').removeClass('fa-square-o').addClass('fa-square');
            stats = allStats;
        } else {
            $('.checkboxes').addClass('fa-square-o').removeClass('fa-square');
            stats = [];
        }
        $('#status').val(stats);
        // console.log(stats);
    });

    function removeValueFromArray(val) {
        stats = $.grep(stats, function(value) {
            return value != val;
        });
    }
</script>
@endsection