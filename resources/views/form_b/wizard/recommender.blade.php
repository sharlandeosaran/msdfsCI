<h3><i class="fa fa-comment" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section 3: Recommender Information</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_first_name') ? ' has-error' : '' }}" id="grp-recommender_first_name">
                                    <label class="control-label mb-0" for="recommender_first_name">
                                        First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your first name, for example "Jane".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_first_name') ? ' has-error' : '' }}" id="grp-recommender_first_name">
                                    <input type="text" class="form-control" id="recommender_first_name" name="recommender_first_name" aria-describedby="" value="{{old('recommender_first_name')? old('recommender_first_name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_first_name">{{ $errors->first('recommender_first_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_surname') ? ' has-error' : '' }}" id="grp-recommender_surname">
                                    <label class="control-label mb-0" for="recommender_surname">
                                        Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your recommender_surname, for example "Doe".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_surname') ? ' has-error' : '' }}" id="grp-recommender_surname">
                                    <input type="text" class="form-control" id="recommender_surname" name="recommender_surname" aria-describedby="" value="{{old('recommender_surname')? old('recommender_surname') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_surname">{{ $errors->first('recommender_surname') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_gender') ? ' has-error' : '' }}" id="grp-recommender_gender">
                                    <label class="control-label mb-0" for="recommender_gender">
                                        Gender <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your gender, for example "Female".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_gender') ? ' has-error' : '' }}" id="grp-recommender_gender">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="recommender_male" name="recommender_gender" class="custom-control-input" value="male" required {{old('recommender_gender') == 'male'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="recommender_male">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="recommender_female" name="recommender_gender" class="custom-control-input" value="female" {{old('recommender_gender') == 'female'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="recommender_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_gender">{{ $errors->first('recommender_gender') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_job_title') ? ' has-error' : '' }}" id="grp-recommender_job_title">
                                    <label class="control-label mb-0" for="recommender_job_title">
                                        Job Title <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_job_title') ? ' has-error' : '' }}" id="grp-recommender_job_title">
                                    <input type="text" class="form-control" id="recommender_job_title" name="recommender_job_title" aria-describedby="" value="{{old('recommender_job_title')? old('recommender_job_title') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_job_title">{{ $errors->first('recommender_job_title') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_contact_no') ? ' has-error' : '' }}" id="grp-recommender_contact_no">
                                    <label class="control-label mb-0" for="recommender_contact_no">
                                        Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your contact number, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_contact_no') ? ' has-error' : '' }}" id="grp-recommender_contact_no">
                                    <input type="text" class="form-control" id="recommender_contact_no" name="recommender_contact_no" aria-describedby="" value="{{old('recommender_contact_no')? old('recommender_contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_contact_no">{{ $errors->first('recommender_contact_no') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_email') ? ' has-error' : '' }}" id="grp-recommender_email">
                                    <label class="control-label mb-0" for="recommender_email">
                                        Email Address 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your email address, for example "example@email.com".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_email') ? ' has-error' : '' }}" id="grp-recommender_email">
                                    <input type="email" class="form-control" id="recommender_email" name="recommender_email" aria-describedby="" value="{{old('recommender_email')? old('recommender_email') : '' }}" placeholder="example@email.com">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_email">{{ $errors->first('recommender_email') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_home_address') ? ' has-error' : '' }}" id="grp-recommender_home_address">
                                    <label class="control-label mb-0" for="recommender_home_address">
                                        Home Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_home_address') ? ' has-error' : '' }}" id="grp-recommender_home_address">
                                    <textarea class="form-control" id="recommender_home_address" name="recommender_home_address" rows="3" required>{{old('recommender_home_address')? old('recommender_home_address') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_home_address">{{ $errors->first('recommender_home_address') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_years_known') ? ' has-error' : '' }}" id="grp-recommender_years_known">
                                    <label class="control-label mb-0" for="recommender_years_known">
                                        Period Known <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your first name, for example "Jane".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_years_known') ? ' has-error' : '' }}" id="grp-recommender_years_known">
                                    <div class="input-group">
                                        <input type="number" min="0" step="1" class="form-control" id="recommender_years_known" name="recommender_years_known" aria-describedby="" value="{{old('recommender_years_known')? old('recommender_years_known') : '' }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">years</span>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_years_known">{{ $errors->first('recommender_years_known') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</section>