@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{route('schedules')}}">Schedules</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{route('schedules')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> back to schedules</a>
                    <a class="btn btn-success pull-right" href="{{url('/admin/schedules/pdf/'.$schedule->id)}}" target="_blank"><i class="fas fa-file-pdf fa-lg"></i> export</a>
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
                                {{-- @foreach ($feedback as $item)
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
                                @endforeach --}}
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Submitter</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Category (Sub-Categories)</th>
                                    <th class="text-right">Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                    
                </div>

                {{-- <div class="box-footer">
                    <a href="{{route('schedules')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> back to schedules</a>
                </div> --}}
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script>
    $(function () {
        
    })
</script>
@endsection