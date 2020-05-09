@extends('layouts.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>
</ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow" style="background-color: rgba(255, 255, 255, 0.95);">
                <div class="card-header bg-primary text-white">
                    <h3>Please fill out the following form</h3>
                </div>

                <div class="card-body">
                    @include('common.errors')
    
                    <!-- Success alert -->
                    @if(session('success'))
                    <div class="col-md-12">
                        <div class="alert alert-dismissible alert-success text-center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4><i class="fa fa-check-circle" aria-hidden="true"></i> Submission was successful.</h4>
                        </div>
                    </div>
                    @endif
                    
                    <form id="form" method="POST" action="{{route('formapost')}}" enctype="multipart/form-data" role="form">
                        @csrf

                        <fieldset>
                        
                            <div class="form-group">
                                <div class="required">
                                    <span class="red">*</span> Required Fields <br>
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Help
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                <label class="control-label" for="name">
                                    Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your first name and surname, for example "Jane Doe".'></i>
                                </label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>

                                <span class="help-block">
                                    <strong id="err-name">{{ $errors->first('name') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('organization_type') ? ' has-error' : '' }}" id="grp-organization_type">
                                <label class="control-label" for="organization_type">
                                    Submission Type <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select your submission type.'></i>
                                </label>
                                <select class="form-control" id="organization_type" name="organization_type" required>
                                    <option disabled="" selected="">select...</option>
                                    {{-- @foreach ($orgtypes as $type)
                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach --}}
                                </select>

                                <span class="help-block">
                                    <strong id="err-organization_type">{{ $errors->first('organization_type') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('organization') ? ' has-error' : '' }}" id="grp-organization">
                                <label class="control-label" for="organization">
                                    Organization Name &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state the organization you are representing, example "iGovTT".'></i>
                                </label>
                                <input type="text" class="form-control" id="organization" name="organization" aria-describedby=""  value="{{old('organization')? old('organization') : '' }}">

                                <span class="help-block">
                                    <strong id="err-organization">{{ $errors->first('organization') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}" id="grp-phone">
                                <label class="control-label" for="phone">
                                    Phone <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please provide a phone number with your country code to allow further discussions, example "1-868-xxx-xxxx".'></i>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="" placeholder="1-868-xxx-xxxx"  value="{{old('phone')? old('phone') : '' }}" required>

                                <span class="help-block">
                                    <strong id="err-phone">{{ $errors->first('phone') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="grp-email">
                                <label class="control-label" for="email">
                                    Email <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please provide an email to allow further discussion, example "Jane_Doe@yahoo.com".'></i>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="" placeholder="email@example.com"  value="{{old('email')? old('email') : '' }}" required>

                                <span class="help-block">
                                    <strong id="err-email">{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}" id="grp-category">
                                <label class="control-label" for="category">
                                    Category <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select one category for your feedback.'></i>
                                </label>
                                <select class="form-control" id="category" name="category" required>
                                    <option disabled="" selected="">select...</option>
                                    {{-- @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                                    @endforeach --}}
                                </select>

                                <span class="help-block">
                                    <strong id="err-category">{{ $errors->first('category') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('subcategory') || $errors->has('otherField') ? ' has-error' : '' }}" id="grp-subcategory">
                                <label class="control-label" for="subcategory">
                                    Sub Category <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select one or more sub-categories that your feedback references. The "other" option will allow you to suggest a category that should be considered.'></i>
                                </label>
                                <select multiple="" class="form-control" id="subcategory" name="subcategory[]" size="2" required>
                                    {{-- @foreach ($subcategories as $sub)
                                    <option value="{{$sub->id}}" class="subcats hide">{{$sub->subcategory}}</option>
                                    @endforeach --}}
                                    <option value="other">Other</option>
                                </select>
                                <input type="text" class="form-control hide" id="otherField" name="otherField" aria-describedby="" placeholder="Enter other sub-category"  value="{{old('otherField')? old('otherField') : '' }}">
                                <p class="help-block"><small>Press Ctrl/Cmd to select multiple</small></p>

                                <span class="help-block">
                                    <strong id="err-subcategory">{{ $errors->first('subcategory') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}" id="grp-subject">
                                <label class="control-label" for="subject">
                                    Subject <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state the high-level idea or focus point of your feedback, example "Delivery of hampers to family in need".'></i>
                                </label>
                                <input type="text" class="form-control" id="subject" name="subject" aria-describedby=""  value="{{old('subject')? old('subject') : '' }}" required>

                                <span class="help-block">
                                    <strong id="err-subject">{{ $errors->first('subject') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}" id="grp-comments">
                                <label class="control-label" for="comments">
                                    Comments <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please share all points related to the category and subcategories selected."></i>
                                </label>
                                <textarea class="form-control" id="comments" name="comments" rows="3" maxlength="1000" required>{{old('comments')? old('comments') : '' }}</textarea>
                                <p class="help-block"><small>character limit: <span id="comment_limit">1000</span> of 1000</small></p>

                                <span class="help-block">
                                    <strong id="err-comments">{{ $errors->first('comments') }}</strong>
                                </span>
                            </div>
                            
                            <div class="form-group{{ $errors->has('upload') ? ' has-error' : '' }}" id="grp-upload">
                                <label class="control-label" for="">
                                    Upload Document(s) &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please upload any documents that support your feedback. You can attach pdf, word or text documents with a maximum size of 10Mb."></i>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload1" name="upload1" accept="application/msword, text/plain, application/pdf">
                                        <label class="custom-file-label" for="upload1" id="upload1Label">Choose file</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload2" name="upload2" accept="application/msword, text/plain, application/pdf">
                                        <label class="custom-file-label" for="upload2" id="upload2Label">Choose file</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload3" name="upload3" accept="application/msword, text/plain, application/pdf">
                                        <label class="custom-file-label" for="upload3" id="upload3Label">Choose file</label>
                                    </div>
                                </div>
                                <p class="help-block">
                                    <small>max size 10Mb per file.</small>
                                </p>

                                <span class="help-block">
                                    <strong id="err-upload">{{ $errors->first('upload') }}</strong>
                                </span>
                            </div>

                            {{-- @include('layouts.recaptcha') --}}

                            <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
{{-- @include('layouts.recaptchascript') --}}

<script>
    $(document).ready(function(){

        // focus on name when page loads
        @if (!session('success') && count($errors) <= 0)
            $('#name').focus();
        @endif

        // comment limit
        $(document).on('keyup mouseup change blur mouseleave', '#comments', function() {
            // alert();
            var count = $(this).val().length;
            $('#comment_limit').text(1000 - count);
        });

        // sub-category show and hide
        var cats = [];
        // console.log(cats);
        $('#category').change(function() {
            var val = $(this).val();
            // console.log(val);
            var cnt = 1;
            $('.subcats').addClass('hide').prop('selected', false);

            cats[val].forEach(e => {
                $('#subcategory option[value="'+ e +'"]').removeClass('hide');
                cnt++;
                // console.log(e);
            });
            $('#subcategory').attr('size',cnt);
        });
        
        // other sub-category name
        $('#subcategory').change(function() {
            var val = $(this).val();
            // console.log(val)

            if (val.includes('other')) {
                $('#otherField').removeClass('hide').focus();
            } else {
                $('#otherField').addClass('hide').val('');
            }
        });
        
        // show name of uploaded file
        $('input[type="file"]'). change(function(e){
            var fileName = $(this).prop('id');
            $('#'+fileName+'Label').html('Choose file');
            if ($(this).val() !== '') {
                var upload = e. target. files[0]. name;
                var size = e. target. files[0].size;
                // console.log(size);

                if (size > 10485760) {
                    alert('Maximum file size is 10Mb. \nFile not uploaded.');
                    $(this).val('');
                } else {
                    $('#'+fileName+'Label').html(upload);
                }
                
            }
        });

        // clear error status and add confirm data
        $('.form-control').change(function() {
            var id = $(this).prop('id');
            $('#grp-'+id).removeClass('has-error');
            $('#err-'+id).html('');
        });

        // recaptcha check
        $("form").submit(function(event) {
            
            var category = $("#category").val();
            var organization_type = $("#organization_type").val();
            var recaptcha = $("#g-recaptcha-response").val();

            if (!category || !organization_type) {
                event.preventDefault();
                alert("Please fill or select all required fields.");
                setTimeout(function(){ $(':submit').html('Submit').removeClass('disabled').prop('disabled', false);}, 10);
            } else if (recaptcha === "")  {
                // event.preventDefault();
                // alert("Please check the recaptcha");
                // setTimeout(function(){ $(':submit').html('Submit').removeClass('disabled').prop('disabled', false);}, 10);
            }
        });

    });
</script>
@endsection
