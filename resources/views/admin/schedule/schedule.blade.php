@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" /> 
<link href="{{ asset('css/tables.css') }}" rel="stylesheet" />

<section class="content">
    
	<div class="col-md-12">
        @include('common.errors')
    </div>
        
    <div class="row">
        
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    {{-- <h3 class="box-title">Application Priorities</h3> --}}
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width='5%'>ID</th>
                                    <th width='25%'>Schedule Type</th>
                                    <th width='25%'>Region</th>
                                    <th width='15%'>Date</th>
                                    <th width='25%'>Created By</th>
                                    <th width='5%'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_rows">
                                @foreach ($schedules as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        {!!$item->type!!}
                                    </td>
                                    <td>
                                        {!!$item->region!!}
                                    </td>
                                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                                    <td>{{$item->createdBy->name}}</td>
                                    <td><a href="#" class="btn btn-danger btn-xs application_view" data-toggle="modal" data-target="#modalview" application="{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> view</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant</th>
                                    <th>Form Type</th>
                                    <th>Region</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" defer></script>

<script>
    $(function () {
        @include('admin.includes.script')

    
    })
</script>
@endsection