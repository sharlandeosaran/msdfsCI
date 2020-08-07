@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{route('logs')}}">Logs</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3>Current | <span class="text-red">{{version()}}</span></h3>
                </div>
                <div class="box-body">
                    
                    <h4 class="text-red">Version 0.1.0</h4>
                    <p>Development.</p>
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