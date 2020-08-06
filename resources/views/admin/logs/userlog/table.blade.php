@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('logs')}}">Logs</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" /> 
<link href="{{ asset('css/tables.css') }}" rel="stylesheet" /> 

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>IP</th>
                                    <th>Action</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user()->name}}</td>
                                    <td>{{$item->ip}}</td>
                                    <td>{{$item->action}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>IP</th>
                                    <th>Action</th>
                                    <th>Timestamp</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" defer></script>

<script>
    $(function () {
        $('#example1').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [25, 50, 100, -1],
            [25, 50, 100, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search table",
            },
            "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
            "order": [[ 0, "desc" ]]
        });
    })
</script>
@endsection