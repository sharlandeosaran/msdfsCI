@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('users')}}">Users</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
<style>
    .icheckbox_flat-red {margin-right: 10px;}
</style>

@include('common.errors')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form method="POST" action="{{ isset($data)? route('userupdate') : route('userspost') }}">
                    @csrf
                    @if (isset($data)) 
                        @method('PUT')
                        <input type="hidden" value="{{$data->id}}" name="id">
                    @endif
                    
                    <div class="box-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')? old('name') : (isset($data) ? $data->name : '') }}" {{old('name') || isset($data)? '' : 'autofocus'}}>

                            <span class="help-block">
                                <strong id="err-name">{{ $errors->first('name') }}</strong>
                            </span>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="grp-email">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')? old('email') : (isset($data) ? $data->email : '') }}">

                            <span class="help-block">
                                <strong id="err-email">{{ $errors->first('email') }}</strong>
                            </span>
                        </div>

                        <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}" id="grp-categories">
                            <label for="">Categories</label>
                            
                            @foreach ($categories as $cat)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat-red categories" id="categories{{$cat->id}}" name="categories[{{$cat->id}}]" {{old('categories') && array_key_exists($cat->id, old('categories')) ? 'checked' : (count($errors) <= 0 && isset($data) && in_array($cat->id, $data->category_id()->toArray())? 'checked' : '')}}> {{$cat->category}}
                                </label>
                            </div>
                            @endforeach

                            {{-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="flat-red categories" id="categories-all"> select all
                                </label>
                            </div> --}}

                            <span class="help-block">
                                <strong id="err-categories">{{ $errors->first('categories') }}</strong>
                            </span>
                        </div>
                        
                        <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}" id="grp-admin">
                            <label for="">Role</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="admin" value="0" class="flat-red"  {{old('admin') && old('admin') == 1? '' : (count($errors) <= 0 && isset($data) && $data->admin? '' : 'checked')}}>
                                    General User
                                </label>
                                <label>
                                    <input type="radio" name="admin" value="1" class="flat-red" {{old('admin') && old('admin') == 1? 'checked' : (count($errors) <= 0 && isset($data) && $data->admin? 'checked' : '')}}>
                                    Administrator
                                </label>
                            </div>

                            <span class="help-block">
                                <strong id="err-admin">{{ $errors->first('admin') }}</strong>
                            </span>
                        </div>
                        
                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}" id="grp-active">
                            <label for="">Active</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="active" value="1" class="flat-red" {{old('active') && old('active') == 1? 'checked' : (count($errors) <= 0 && isset($data) && $data->active? 'checked' : '')}}>
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" name="active" value="0" class="flat-red"  {{old('active') && old('active') == 1? '' : (count($errors) <= 0 && isset($data) && $data->active? '' : 'checked')}}>
                                    No
                                </label>
                            </div>

                            <span class="help-block">
                                <strong id="err-active">{{ $errors->first('active') }}</strong>
                            </span>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                    
                    {{-- <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<script>
    
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass   : 'iradio_flat-red'
    });
</script>
@endsection
