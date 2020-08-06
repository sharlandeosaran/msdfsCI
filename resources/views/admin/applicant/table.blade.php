@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('reports')}}">Submission Reports</a></li>
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
                <div class="box-header">
                    <a href="{{route('reports')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> back to reports</a>
                </div>
                
                <div class="box-body">
                    
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width='5%'>id</th>
                                    <th width='25%'>Submitter</th>
                                    <th width='10%'>Status</th>
                                    <th width='15%'>Type</th>
                                    <th width='25%'>Category (Sub-Categories)</th>
                                    <th width='15%' class="text-right">Date</th>
                                    <th width='5%'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedback as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        {!!$item->name!!} <br>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        <span class="label label-{{$item->status_colour}}">{{$item->status}}</span>
                                        @if ($item->status_id == 2)
                                        <br>
                                        <small>{{$item->assigner}} <i class="fa fa-arrow-right margin-r-5"></i> {{$item->assignee}}</small>
                                        @endif
                                    </td>
                                    <td>{{$item->submission_type}}</td>
                                    <td>
                                        {{$item->category}}
                                        @foreach ($item->subcategories() as $sub)
                                        <small><br> - {{$sub}}</small> 
                                        @endforeach
                                    </td>
                                    <td class="text-right">{{$item->created_at->format('Y-m-d')}}</td>
                                    <td><a href="{{url('/admin/submissions/view/'.$item->id)}}" class="btn btn-danger btn-xs" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> view</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Submitter</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Category (Sub-Categories)</th>
                                    <th class="text-right">Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>

                <div class="box-footer">
                    <a href="{{route('reports')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> back to reports</a>
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