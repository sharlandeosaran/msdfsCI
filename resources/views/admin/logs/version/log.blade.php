@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{route('logs')}}">Logs</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
<style>
    .icheckbox_flat-red {margin-right: 10px;}
</style>

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3>
                        Current | <span class="text-red">{{version()}}</span>
                        <button class="btn btn-success btn-sm pull-right btnnewlog" type="button"><i class="fa fa-plus"></i> new log</button>
                        <button class="btn btn-success btn-sm pull-right btnsubmit newlog" style="display: none" type="submit"><i class="fa fa-check"></i> save</button>
                        <button class="btn btn-danger btn-sm pull-right btncancel newlog" style="display: none" type="button"><i class="fa fa-remove"></i> cancel</button>
                    </h3>
                </div>
                <div class="box-body">
                    
                    <div class="panel panel-default newlog" style="display: none">
                        <div class="panel-body">
                            <form method="POST" action="{{ route('postversionlog') }}" id="logForm">
                                @csrf
                                
                                <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}" id="grp-version">
                                    <label for="version">Version Type</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="version" value="1" class="flat-red" {{old('version') && old('version') == 1? 'checked' : ''}}>
                                            Major Release
                                        </label>
                                        <label>
                                            <input type="radio" name="version" value="2" class="flat-red"  {{old('version') && old('version') == 2? 'checked' : ''}}>
                                            New Feature
                                        </label>
                                        <label>
                                            <input type="radio" name="version" value="3" class="flat-red"  {{old('version') && old('version') == 3? 'checked' : ''}}>
                                            Minor Update
                                        </label>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-version">{{ $errors->first('version') }}</strong>
                                    </span>
                                </div>
                                
                                <div class="form-group{{ $errors->has('log') ? ' has-error' : '' }}" id="grp-log">
                                    <label for="log">New Log</label>
                                    <textarea id="log" name="log" rows="10" cols="80" placeholder="Enter version details."></textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-log">{{ $errors->first('log') }}</strong>
                                    </span>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                    @foreach ($logs as $log)
                        <h4 class="text-red">Version {{$log->version}}</h4>
                        {!! $log->log !!}
                    @endforeach
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- CK Editor -->
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        CKEDITOR.replace('log');
        // submit new log
        $(document).on('click', '.btnsubmit', function() {
            $('#logForm').submit();
        });
        
        // show / hide new log framework
        $(document).on('click', '.btnnewlog', function() {
            $('.newlog').show('slow');
            $(this).hide('slow');
        });
        $(document).on('click', '.btncancel', function() {
            $('.newlog').hide('slow');
            $('.btnnewlog').show('slow');
        });
        
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass   : 'iradio_flat-red'
        });
    })
</script>
@endsection