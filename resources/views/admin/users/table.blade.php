@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <div class="row" style="padding-bottom:10px">
                        <div class="col-md-12">
                            <a href="{{route('newuser')}}" class="btn btn-danger"><i class="fa fa-user-plus" aria-hidden="true"></i> New User</a>
                        </div>
                    </div>
                        
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width='5%'>id</th>
                                    <th width='25%'>Name</th>
                                    <th width='20%'>Email</th>
                                    <th width='27%'>Categories</th>
                                    <th width='15%'>Last Online</th>
                                    <th width='15%'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        {!!$item->name!!}
                                        @if ($item->admin)
                                            <br><strong class="text-danger"><i>(administrator)</i></strong>
                                        @endif
                                        @if (!$item->active)
                                            <br><strong class="text-danger"><i>inactive</i></strong>
                                        @endif
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @foreach ($item->categories() as $sub)
                                        - {{$sub}} <br>
                                        @endforeach
                                    </td>
                                    <td>{{$item->last_online}}</td>
                                    <td>
                                        <a href="{{url('/admin/users/view/'.$item->id)}}" class="btn btn-danger btn-xs">view</a>
                                        <a href="{{url('/admin/users/edit/'.$item->id)}}" class="btn btn-danger btn-xs">edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Categories</th>
                                    <th>Last Online</th>
                                    <th>Action</th>
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
            "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
        });
    })
</script>
@endsection