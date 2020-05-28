<h3><i class="fa fa-user" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title">Section 1: General Information</h5>
            <h5 class=""><strong><i>TO BE COMPLETED BY ALL APPLICANTS</i></strong></h5>
            
            <div class="form-group mb-0 mb-2">
                <div class="required">
                    <span class="red">*</span> Required Fields <br>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Help
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('first_name') ? ' has-error' : '' }}" id="grp-first_name">
                                    <label class="control-label mb-0" for="first_name">
                                        First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your first name, for example "Jane".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('first_name') ? ' has-error' : '' }}" id="grp-first_name">
                                    <input type="text" class="form-control name" id="first_name" name="first_name" aria-describedby="" value="{{old('first_name')? old('first_name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-first_name">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('surname') ? ' has-error' : '' }}" id="grp-surname">
                                    <label class="control-label mb-0" for="surname">
                                        Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your surname, for example "Doe".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('surname') ? ' has-error' : '' }}" id="grp-surname">
                                    <input type="text" class="form-control name" id="surname" name="surname" aria-describedby="" value="{{old('surname')? old('surname') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-surname">{{ $errors->first('surname') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('gender') ? ' has-error' : '' }}" id="grp-gender">
                                    <label class="control-label mb-0" for="gender">
                                        Gender <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your gender, for example "Female".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('gender') ? ' has-error' : '' }}" id="grp-gender">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="male" name="gender" class="custom-control-input gender" value="male" required {{old('gender') == 'male'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="male">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="female" name="gender" class="custom-control-input gender" value="female" {{old('gender') == 'fesmale'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-gender">{{ $errors->first('gender') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('contact_no') ? ' has-error' : '' }}" id="grp-contact_no">
                                    <label class="control-label mb-0" for="contact_no">
                                        Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your contact number, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('contact_no') ? ' has-error' : '' }}" id="grp-contact_no">
                                    <input type="text" class="form-control phone" id="contact_no" name="contact_no" aria-describedby="" value="{{old('contact_no')? old('contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-contact_no">{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('email') ? ' has-error' : '' }}" id="grp-email">
                                    <label class="control-label mb-0" for="email">
                                        Email Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your email address, for example "example@email.com".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('email') ? ' has-error' : '' }}" id="grp-email">
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="" value="{{old('email')? old('email') : '' }}" required placeholder="example@email.com">
                                    
                                    <span class="help-block">
                                        <strong id="err-email">{{ $errors->first('email') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('home_address') ? ' has-error' : '' }}" id="grp-home_address">
                                    <label class="control-label mb-0" for="home_address">
                                        Home Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('home_address') ? ' has-error' : '' }}" id="grp-home_address">
                                    <textarea class="form-control" id="home_address" name="home_address" rows="3" required>{{old('home_address')? old('home_address') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-home_address">{{ $errors->first('home_address') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('city_town') ? ' has-error' : '' }}" id="grp-city_town">
                                    <label class="control-label mb-0" for="city_town">
                                        City/Town <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your first name, for example "Jane".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('city_town') ? ' has-error' : '' }}" id="grp-city_town">
                                    <select class="form-control" id="city_town" name="city_town">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($cities as $city)
                                        <option {{old('city_town') == $city? 'selected' : '' }}>{{$city}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-city_town">{{ $errors->first('city_town') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('citizen_proof') ? ' has-error' : '' }}" id="grp-citizen_proof">
                                    <label class="control-label mb-0" for="citizen_proof">
                                        Proof of Citizenship/ Permanent Residence 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your submission type.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('citizen_proof') ? ' has-error' : '' }}" id="grp-citizen_proof">
                                    <select class="form-control" id="citizen_proof" name="citizen_proof">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($citizen_proof as $proof)
                                        <option {{old('citizen_proof') == $proof? 'selected' : '' }}>{{$proof}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-citizen_proof">{{ $errors->first('citizen_proof') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('national_id') ? ' has-error' : '' }}" id="grp-national_id">
                                    <label class="control-label mb-0" for="national_id">
                                        National Identification Card Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your national id number, for example "20000101001".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('national_id') ? ' has-error' : '' }}" id="grp-national_id">
                                    <input type="number" min="0" step="1" class="form-control" id="national_id" name="national_id" aria-describedby="" value="{{old('national_id')? old('national_id') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-national_id">{{ $errors->first('national_id') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('nis') ? ' has-error' : '' }}" id="grp-nis">
                                    <label class="control-label mb-0" for="nis">
                                        National Insurance Number 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your national insurance number, for example "2000010".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('nis') ? ' has-error' : '' }}" id="grp-nis">
                                    <input type="number" min="0" step="1" class="form-control" id="nis" name="nis" aria-describedby="" value="{{old('nis')? old('nis') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-nis">{{ $errors->first('nis') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('emp_classification') ? ' has-error' : '' }}" id="grp-emp_classification">
                                    <label class="control-label mb-0" for="emp_classification">
                                        Employment Classification <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your employment classification, for example "Retrenched".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('emp_classification') ? ' has-error' : '' }}" id="grp-emp_classification">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="retrenched" name="emp_classification" class="custom-control-input" value="retrenched" {{old('emp_classification') == 'retrenched'? 'checked' : '' }} required>
                                                <label class="custom-control-label my-1" for="retrenched">Retrenched</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="terminated" name="emp_classification" class="custom-control-input" value="terminated" {{old('emp_classification') == 'terminated'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="terminated">Terminated</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="income_reduced" name="emp_classification" class="custom-control-input" value="income_reduced" {{old('emp_classification') == 'income_reduced'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="income_reduced">Income Reduced</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-emp_classification">{{ $errors->first('emp_classification') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('effective_date') ? ' has-error' : '' }}" id="grp-effective_date">
                                    <label class="control-label mb-0" for="effective_date">
                                        Effective Date <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('effective_date') ? ' has-error' : '' }}" id="grp-effective_date">
                                    <input type="text" class="form-control effectiveDate" id="effective_date" name="effective_date" aria-describedby="" value="{{old('effective_date')? old('effective_date') : '' }}" required placeholder="yyyy-mm-dd" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-effective_date">{{ $errors->first('effective_date') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('job_title') ? ' has-error' : '' }}" id="grp-job_title">
                                    <label class="control-label mb-0" for="job_title">
                                        Job Title 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('job_title') ? ' has-error' : '' }}" id="grp-job_title">
                                    <input type="text" class="form-control" id="job_title" name="job_title" aria-describedby="" value="{{old('job_title')? old('job_title') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-job_title">{{ $errors->first('job_title') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('assistance_sought') ? ' has-error' : '' }}" id="grp-assistance_sought">
                                    <label class="control-label mb-0" for="assistance_sought">
                                        Assistance Being Sought <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your employment classification, for example "Retrenched".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('assistance_sought') ? ' has-error' : '' }}" id="grp-assistance_sought">
                                    <div class="col-md-12 checkbox-group required">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="public_assistance" name="assistance_sought[1]" {{old('assistance_sought.1') == 'on'? 'checked' : '' }}>
                                            <label class="custom-control-label my-1" for="public_assistance">Income Support Grant</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rental_assistance" name="assistance_sought[2]" {{old('assistance_sought.2') == 'on'? 'checked' : '' }}>
                                            <label class="custom-control-label my-1" for="rental_assistance">Rental Assistance Grant</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="temp_food_card" name="assistance_sought[3]" {{old('assistance_sought.3') == 'on'? 'checked' : '' }}>
                                            <label class="custom-control-label my-1" for="temp_food_card">Temporary Food Card Support</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-assistance_sought">{{ $errors->first('assistance_sought') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_name') ? ' has-error' : '' }}" id="grp-landlord_name">
                                    <label class="control-label mb-0" for="landlord_name">
                                        Landlord First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_name') ? ' has-error' : '' }}" id="grp-landlord_name">
                                    <input type="text" class="form-control landlord" id="landlord_name" name="landlord_name" aria-describedby="" value="{{old('landlord_name')? old('landlord_name') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_name">{{ $errors->first('landlord_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_name') ? ' has-error' : '' }}" id="grp-landlord_name">
                                    <label class="control-label mb-0" for="landlord_name">
                                        Landlord Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_name') ? ' has-error' : '' }}" id="grp-landlord_name">
                                    <input type="text" class="form-control landlord" id="landlord_name" name="landlord_name" aria-describedby="" value="{{old('landlord_name')? old('landlord_name') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_name">{{ $errors->first('landlord_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_contact_no') ? ' has-error' : '' }}" id="grp-landlord_contact_no">
                                    <label class="control-label mb-0" for="landlord_contact_no">
                                        Landlord Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your contact number, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_contact_no') ? ' has-error' : '' }}" id="grp-landlord_contact_no">
                                    <input type="text" class="form-control landlord phone" id="landlord_contact_no" name="landlord_contact_no" aria-describedby="" value="{{old('landlord_contact_no')? old('landlord_contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_contact_no">{{ $errors->first('landlord_contact_no') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_name') ? ' has-error' : '' }}" id="grp-landlord_name">
                                    <label class="control-label mb-0" for="landlord_name">
                                        Rental Amount <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_name') ? ' has-error' : '' }}" id="grp-landlord_name">
                                    <input type="text" class="form-control landlord" id="landlord_name" name="landlord_name" aria-describedby="" value="{{old('landlord_name')? old('landlord_name') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_name">{{ $errors->first('landlord_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('bank_name') ? ' has-error' : '' }}" id="grp-bank_name">
                                    <label class="control-label mb-0" for="bank_name">
                                        Bank Name 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your submission type.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('bank_name') ? ' has-error' : '' }}" id="grp-bank_name">
                                    <select class="form-control" id="bank_name" name="bank_name">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($banks as $bank)
                                        <option {{old('bank_name') == $bank? 'selected' : '' }}>{{$bank}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-bank_name">{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="{{old('bank_name') && old('bank_name') == 'Scotiabank'? '' : 'hide' }}" id="scotia_area_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('scotia_area') ? ' has-error' : '' }}" id="grp-scotia_area">
                                    <label class="control-label mb-0" for="scotia_area">
                                        Branch Area <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your submission type.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('scotia_area') ? ' has-error' : '' }}" id="grp-scotia_area">
                                    <select class="form-control" id="scotia_area" name="scotia_area">
                                        <option disabled="" selected="" value="0">select...</option>
                                        @foreach ($scotia as $no => $branch)
                                        <option value="{{$no}}" {{old('scotia_area') == $no? 'selected' : '' }}>{{$branch}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-scotia_area">{{ $errors->first('scotia_area') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="{{old('bank_name') && old('bank_name') == 'Scotiabank'? 'hide' : '' }}" id="bank_branch_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('bank_branch') ? ' has-error' : '' }}" id="grp-bank_branch">
                                    <label class="control-label mb-0" for="bank_branch">
                                        Bank Branch 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your submission type.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('bank_branch') ? ' has-error' : '' }}" id="grp-bank_branch">
                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch" aria-describedby="" value="{{old('bank_branch')? old('bank_branch') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-bank_branch">{{ $errors->first('bank_branch') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('bank_account') ? ' has-error' : '' }}" id="grp-bank_account">
                                    <label class="control-label mb-0" for="bank_account">
                                        Account Number 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your submission type.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('bank_account') ? ' has-error' : '' }}" id="grp-bank_account">
                                    <input type="number" min="0" step="1" class="form-control" id="bank_account" name="bank_account" aria-describedby="" value="{{old('bank_account')? old('bank_account') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-bank_account">{{ $errors->first('bank_account') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr></tr>
                    </tbody>
                </table>
            </div>
            
            
            
        </div>
    </div>
</section>