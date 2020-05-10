<h3><i class="fa fa-user" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title">Section 1: Employee Information</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="form-group mb-4">
                <div class="required">
                    <span class="red">*</span> Required Fields <br>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Help
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('f_name') ? ' has-error' : '' }}" id="grp-f_name">
                        <label class="control-label" for="f_name">
                            First Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your first name, for example "Jane".'></i>
                        </label>
                        <input type="text" class="form-control" id="f_name" name="f_name" aria-describedby="" value="{{old('f_name')? old('f_name') : '' }}" required>
                        
                        <span class="help-block">
                            <strong id="err-f_name">{{ $errors->first('f_name') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}" id="grp-surname">
                        <label class="control-label" for="surname">
                            Surname <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your surname, for example "Doe".'></i>
                        </label>
                        <input type="text" class="form-control" id="surname" name="surname" aria-describedby="" value="{{old('surname')? old('surname') : '' }}" required>
                        
                        <span class="help-block">
                            <strong id="err-surname">{{ $errors->first('surname') }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}" id="grp-gender">
                <label class="control-label" for="gender">
                    Gender <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select your gender, for example "Female".'></i>
                </label>

                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="male" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="female" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                        
                <span class="help-block">
                    <strong id="err-gender">{{ $errors->first('gender') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('national_id') ? ' has-error' : '' }}" id="grp-national_id">
                <label class="control-label" for="national_id">
                    National ID <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your national id number, for example "20000101001".'></i>
                </label>
                <input type="text" class="form-control" id="national_id" name="national_id" aria-describedby="" value="{{old('national_id')? old('national_id') : '' }}" required>

                <span class="help-block">
                    <strong id="err-national_id">{{ $errors->first('national_id') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('nis') ? ' has-error' : '' }}" id="grp-nis">
                <label class="control-label" for="nis">
                    National Insurance <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your national insurance number, for example "2000010".'></i>
                </label>
                <input type="text" class="form-control" id="nis" name="nis" aria-describedby="" value="{{old('nis')? old('nis') : '' }}" required>

                <span class="help-block">
                    <strong id="err-nis">{{ $errors->first('nis') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}" id="grp-job_title">
                <label class="control-label" for="job_title">
                    Job Title <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>
                <input type="text" class="form-control" id="job_title" name="job_title" aria-describedby="" value="{{old('job_title')? old('job_title') : '' }}" required>

                <span class="help-block">
                    <strong id="err-job_title">{{ $errors->first('job_title') }}</strong>
                </span>
            </div>
            
            <div class="form-group{{ $errors->has('emp_classification') ? ' has-error' : '' }}" id="grp-emp_classification">
                <label class="control-label" for="emp_classification">
                    Employment Classification <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select your employment classification, for example "Retrenched".'></i>
                </label>

                <div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="retrenched" name="emp_classification" class="custom-control-input">
                            <label class="custom-control-label" for="retrenched">Retrenched</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="terminated" name="emp_classification" class="custom-control-input">
                            <label class="custom-control-label" for="terminated">Terminated</label>
                        </div>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="income_reduced" name="emp_classification" class="custom-control-input">
                            <label class="custom-control-label" for="income_reduced">Income Reduced</label>
                        </div>
                    </div>
                </div>
                        
                <span class="help-block">
                    <strong id="err-emp_classification">{{ $errors->first('emp_classification') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('effective_date') ? ' has-error' : '' }}" id="grp-effective_date">
                <label class="control-label" for="effective_date">
                    Effective Date <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>
                <input type="text" class="form-control" id="effective_date" name="effective_date" aria-describedby="" value="{{old('effective_date')? old('effective_date') : '' }}" required placeholder="dd/mm/yyyy">

                <span class="help-block">
                    <strong id="err-effective_date">{{ $errors->first('effective_date') }}</strong>
                </span>
            </div>
            
            <div class="form-group{{ $errors->has('assistance_sought') ? ' has-error' : '' }}" id="grp-assistance_sought">
                <label class="control-label" for="assistance_sought">
                    Assistance Being Sought <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select your employment classification, for example "Retrenched".'></i>
                </label>
                
                <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="public_assistance" name="assistance_sought">
                        <label class="custom-control-label" for="public_assistance">Public Assistance Grant</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rental_assistance" name="assistance_sought">
                        <label class="custom-control-label" for="rental_assistance">Rental Assistance Grant</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="temp_food_card" name="assistance_sought">
                        <label class="custom-control-label" for="temp_food_card">Temporary Food Card Support</label>
                    </div>
                </div>
                
                <span class="help-block">
                    <strong id="err-assistance_sought">{{ $errors->first('assistance_sought') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}" id="grp-contact_no">
                <label class="control-label" for="contact_no">
                    Contact Number <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please enter your contact number, for example "(868) 555-1234".'></i>
                </label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" aria-describedby="" value="{{old('contact_no')? old('contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx">

                <span class="help-block">
                    <strong id="err-contact_no">{{ $errors->first('contact_no') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="grp-email">
                <label class="control-label" for="email">
                    Email Address <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please enter your email address, for example "example@email.com".'></i>
                </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="" value="{{old('email')? old('email') : '' }}" required placeholder="example@email.com">

                <span class="help-block">
                    <strong id="err-email">{{ $errors->first('email') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('home_address') ? ' has-error' : '' }}" id="grp-home_address">
                <label class="control-label" for="home_address">
                    Home Address <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>
                <input type="text" class="form-control" id="home_address" name="home_address" aria-describedby="" value="{{old('home_address')? old('home_address') : '' }}" required>

                <span class="help-block">
                    <strong id="err-home_address">{{ $errors->first('home_address') }}</strong>
                </span>
            </div>
                            
            <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}" id="grp-bank_name">
                <label class="control-label" for="bank_name">
                    Bank Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select your submission type.'></i>
                </label>
                <select class="form-control" id="bank_name" name="bank_name" required>
                    <option disabled="" selected="">select...</option>
                    {{-- @foreach ($orgtypes as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach --}}
                </select>

                <span class="help-block">
                    <strong id="err-bank_name">{{ $errors->first('bank_name') }}</strong>
                </span>
            </div>
                            
            <div class="form-group{{ $errors->has('branch_name') ? ' has-error' : '' }}" id="grp-branch_name">
                <label class="control-label" for="branch_name">
                    Branch Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please select your submission type.'></i>
                </label>
                <select class="form-control" id="branch_name" name="branch_name" required>
                    <option disabled="" selected="">select...</option>
                    {{-- @foreach ($orgtypes as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach --}}
                </select>

                <span class="help-block">
                    <strong id="err-branch_name">{{ $errors->first('branch_name') }}</strong>
                </span>
            </div>

            <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}" id="grp-account_number">
                <label class="control-label" for="account_number">
                    Account Number <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title='Please state your job title, for example "Manager".'></i>
                </label>
                <input type="text" class="form-control" id="account_number" name="account_number" aria-describedby="" value="{{old('account_number')? old('account_number') : '' }}" required>

                <small id="emailHelp" class="form-text text-muted">Please include Transit Number.</small>
                <span class="help-block">
                    <strong id="err-account_number">{{ $errors->first('account_number') }}</strong>
                </span>
            </div>
            
            
        </div>
    </div>
</section>