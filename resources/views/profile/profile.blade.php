@extends('admin.app') 

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    @if (isset($activelink) && $activelink == 'users')
    <li><a href="{{route('users')}}">Users</a></li>
    @endif
    <li class="active">{{$data->name}}</li>
</ol>
@endsection

@section('content')
<section class="content">
    
    <div class="row">
        
        <!-- Success alert after new password saved -->
        @if(session('password'))
        <div class="col-md-12">
            <div class="alert alert-dismissible alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="fa fa-check-circle" aria-hidden="true"></i> New Password Saved</h4>
            </div>
        </div>
        @endif
    
        <!-- Success alert after password reset -->
        @if(session('reset'))
        <div class="col-md-12">
            <div class="alert alert-dismissible alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="fa fa-check-circle" aria-hidden="true"></i> Password Successfully Reset To:<br><br><i><b>'password'</b></i></h4>
            </div>
        </div>
        @endif
        
        <!-- Success alert after new user created -->
        @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-dismissible alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="fa fa-check-circle" aria-hidden="true"></i> {{session('success')}}</h4>
            </div>
        </div>
        @endif
        
        <!-- Success alert after user updated -->
        @if(session('updated'))
        <div class="col-md-12">
            <div class="alert alert-dismissible alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="fa fa-check-circle" aria-hidden="true"></i> {{session('updated')}}</h4>
            </div>
        </div>
        @endif

        <div class="col-md-12">
            
            @include('common.errors')

            <div class="box">
                <div class="box-header">
                    
                    <h2 style="margin-top:5px">
                        {{ $data->name }} 
                        @if (!$data->active)
                        <small><span class="label label-danger">inactive</span></small>
                        @endif
                                
                        <a href="{{ url('/admin/users/edit/'.$data->id) }}" class="btn btn-success pull-right {{ Auth::user()->admin? '' : 'hide' }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                        <a href="{{ url('/admin/users/resetpassword/'. $data->id) }}" class="btn btn-success pull-right {{ Auth::user()->admin == '1' ? '' : 'hide' }}" title="Reset Password" id="reset"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Reset Password</a>
                        
                        <button type="button" data-toggle="modal" data-target="#passwordModal" class="btn btn-success pull-right {{ Auth::user()->id == $data->id ? '' : 'hide' }}"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</button>

                        <br>
                        <i><small style="font-size: small;font-weight: bold;">last online {{$data->last_online}}</small></i>
                    </h2>
                        
                    <!-- Modal for password change -->
                    @include('profile.passwordmodal')
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('img/avatar.png') }}" class="img-thumbnail img-profile" alt="User Image">
                        </div>
                        <div class="col-md-8">
                            <h3>Role <i class="fa fa-user fa-fw" aria-hidden="true"></i></h3>
                            <h4>{{ $data->role->role }}</h4>
                            <h3>Email <i class="fa fa-envelope fa-fw" aria-hidden="true"></i></h3>
                            <h4>
                                <a href="mailto:{{ $data->email }}" title="send email to {{ $data->email }}">{{ $data->email }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @can('access', 'admin')
                @if (count($data->history()))
                <div class="box box-danger">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>
                            History <i class="fa fa-history margin-r-5"></i> 
                            <button class="btn btn-sm btn-danger pull-right" id="viewhistory"><i class="fa fa-eye margin-r-5"></i>view</button>
                        </h3>
                        
                        <div id="history" class="" style="display:none">
                            @foreach ($data->history() as $item)
                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Attribute</th>
                                            <th>Old</th>
                                            <th>New</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$item->attribute}}</td>
                                            <td>{{$item->old}}</td>
                                            <td>{{$item->new}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <blockquote>
                                <p class="text-justify"></p>
                                <small><cite title="Source Title">
                                    <i class="fa fa-user margin-r-5"></i> {{$item->changedBy->name}}
                                </cite></small>
                                <small><cite title="Source Title">
                                    <i class="fa fa-calendar margin-r-5"></i> {{$item->since}}
                                </cite></small>
                            </blockquote>
                            @endforeach
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                @endif
            @endcan --}}
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script type="text/javascript">

    $('#reset').click(function(){
        var chk = confirm("Reset password?");
        if(!chk) return false;
    });

    $(document).on('click', '#viewhistory', function() {
        $('#history').toggle('slow', function() { 
            if($("#history").is(":visible")) { 
                $('#viewhistory').html('<i class="fa fa-eye-slash margin-r-5"></i>hide');
            } else { 
                $('#viewhistory').html('<i class="fa fa-eye margin-r-5"></i>view');
            } 
        });
    });
    
</script>
    
@endsection