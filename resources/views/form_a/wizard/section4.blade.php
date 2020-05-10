<h3><i class="fa fa-upload" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section 4: Upload Documents</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}

            <div class="form-group{{ $errors->has('emp_name') ? ' has-error' : '' }}" id="grp-emp_name">
                <label class="control-label" for="emp_name">
                    Employer/ Business Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your employer name, for example "Big Company".'></i>
                </label>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                </div>

                <span class="help-block">
                    <strong id="err-emp_name">{{ $errors->first('emp_name') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('emp_address') ? ' has-error' : '' }}" id="grp-emp_address">
                <label class="control-label" for="emp_address">
                    Business/ Mailing Address <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your national insurance number, for example "2000010".'></i>
                </label>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                </div>

                <span class="help-block">
                    <strong id="err-emp_address">{{ $errors->first('emp_address') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('emp_liaison') ? ' has-error' : '' }}" id="grp-emp_liaison">
                <label class="control-label" for="emp_liaison">
                    Authorised Person <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                </div>

                <span class="help-block">
                    <strong id="err-emp_liaison">{{ $errors->first('emp_liaison') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('emp_contact') ? ' has-error' : '' }}" id="grp-emp_contact">
                <label class="control-label" for="emp_contact">
                    Contact Number <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                </div>

                <span class="help-block">
                    <strong id="err-emp_contact">{{ $errors->first('emp_contact') }}</strong>
                </span>
            </div>
            
            
        </div>
    </div>
</section>