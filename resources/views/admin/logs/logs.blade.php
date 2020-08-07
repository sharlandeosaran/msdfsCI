@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
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
                        <a href="{{route('emaillogs')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Email Logs</h3>
                            </div>
                            <p class="mb-1">Tracks the issues and errors that have occurred when sending emails.</p>
                        </a>
                        <a href="{{route('errorlogs')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Error Logs</h3>
                            </div>
                            <p class="mb-1">Tracks exceptions and the users that experienced them.</p>
                        </a>
                        <a href="{{route('userlogs')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">User Logs</h3>
                            </div>
                            <p class="mb-1">Tracks the log in and logout activities performed by users.</p>
                        </a>
                        <a href="{{route('versionlog')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1">Version Log</h3>
                            </div>
                            <p class="mb-1">States the current version of the application and the change log.</p>
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