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
                <div class="box-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Report By Category</h3>
                            </div>
                            {{-- <p class="mb-1">short description</p> --}}
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Report By Date Range</h3>
                            </div>
                            {{-- <p class="mb-1">short description</p> --}}
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Flagged Items</h3>
                            </div>
                            {{-- <p class="mb-1">short description</p> --}}
                        </a>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
</script>
@endsection