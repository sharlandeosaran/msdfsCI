<h3><i class="fa fa-building" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section 2: Employer Information</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}

            <div class="form-group{{ $errors->has('emp_name') ? ' has-error' : '' }}" id="grp-emp_name">
                <label class="control-label" for="emp_name">
                    Employer/ Business Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your employer name, for example "Big Company".'></i>
                </label>
                <input type="text" class="form-control" id="emp_name" name="emp_name" aria-describedby="" value="{{old('emp_name')? old('emp_name') : '' }}" required>

                <span class="help-block">
                    <strong id="err-emp_name">{{ $errors->first('emp_name') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('emp_address') ? ' has-error' : '' }}" id="grp-emp_address">
                <label class="control-label" for="emp_address">
                    Business/ Mailing Address <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your national insurance number, for example "2000010".'></i>
                </label>
                <input type="text" class="form-control" id="emp_address" name="emp_address" aria-describedby="" value="{{old('emp_address')? old('emp_address') : '' }}" required>

                <span class="help-block">
                    <strong id="err-emp_address">{{ $errors->first('emp_address') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('emp_liaison') ? ' has-error' : '' }}" id="grp-emp_liaison">
                <label class="control-label" for="emp_liaison">
                    Authorised Person <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>
                <input type="text" class="form-control" id="emp_liaison" name="emp_liaison" aria-describedby="" value="{{old('emp_liaison')? old('emp_liaison') : '' }}" required>

                <span class="help-block">
                    <strong id="err-emp_liaison">{{ $errors->first('emp_liaison') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('emp_contact') ? ' has-error' : '' }}" id="grp-emp_contact">
                <label class="control-label" for="emp_contact">
                    Contact Number <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>
                <input type="text" class="form-control" id="emp_contact" name="emp_contact" aria-describedby="" value="{{old('emp_contact')? old('emp_contact') : '' }}" required placeholder="(xxx) xxx-xxxx">

                <span class="help-block">
                    <strong id="err-emp_contact">{{ $errors->first('emp_contact') }}</strong>
                </span>
            </div>
            
            
        </div>
    </div>
</section>