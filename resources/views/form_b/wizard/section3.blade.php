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
                                <div class="form-group mb-0{{ $errors->has('rec_f_name') ? ' has-error' : '' }}" id="grp-rec_f_name">
                                    <label class="control-label mb-0" for="rec_f_name">
                                        First Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your first name, for example "Jane".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_f_name') ? ' has-error' : '' }}" id="grp-rec_f_name">
                                    <input type="text" class="form-control" id="rec_f_name" name="rec_f_name" aria-describedby="" value="{{old('rec_f_name')? old('rec_f_name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_f_name">{{ $errors->first('rec_f_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rec_surname') ? ' has-error' : '' }}" id="grp-rec_surname">
                                    <label class="control-label mb-0" for="rec_surname">
                                        Surname <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your rec_surname, for example "Doe".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_surname') ? ' has-error' : '' }}" id="grp-rec_surname">
                                    <input type="text" class="form-control" id="rec_surname" name="rec_surname" aria-describedby="" value="{{old('rec_surname')? old('rec_surname') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_surname">{{ $errors->first('rec_surname') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rec_gender') ? ' has-error' : '' }}" id="grp-rec_gender">
                                    <label class="control-label mb-0" for="rec_gender">
                                        Gender <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please select your gender, for example "Female".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_gender') ? ' has-error' : '' }}" id="grp-rec_gender">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="rec_male" name="rec_gender" class="custom-control-input" value="male">
                                                <label class="custom-control-label my-1" for="rec_male">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="rec_female" name="rec_gender" class="custom-control-input" value="female">
                                                <label class="custom-control-label my-1" for="rec_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_gender">{{ $errors->first('rec_gender') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rec_job_title') ? ' has-error' : '' }}" id="grp-rec_job_title">
                                    <label class="control-label mb-0" for="rec_job_title">
                                        Job Title <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_job_title') ? ' has-error' : '' }}" id="grp-rec_job_title">
                                    <input type="text" class="form-control" id="rec_job_title" name="rec_job_title" aria-describedby="" value="{{old('rec_job_title')? old('rec_job_title') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_job_title">{{ $errors->first('rec_job_title') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rec_contact_no') ? ' has-error' : '' }}" id="grp-rec_contact_no">
                                    <label class="control-label mb-0" for="rec_contact_no">
                                        Contact Number <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your contact number, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_contact_no') ? ' has-error' : '' }}" id="grp-rec_contact_no">
                                    <input type="text" class="form-control" id="rec_contact_no" name="rec_contact_no" aria-describedby="" value="{{old('rec_contact_no')? old('rec_contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx">
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_contact_no">{{ $errors->first('rec_contact_no') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rec_email') ? ' has-error' : '' }}" id="grp-rec_email">
                                    <label class="control-label mb-0" for="rec_email">
                                        Email Address <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please enter your email address, for example "example@email.com".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_email') ? ' has-error' : '' }}" id="grp-rec_email">
                                    <input type="email" class="form-control" id="rec_email" name="rec_email" aria-describedby="" value="{{old('rec_email')? old('rec_email') : '' }}" required placeholder="example@email.com">
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_email">{{ $errors->first('rec_email') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rec_home_address') ? ' has-error' : '' }}" id="grp-rec_home_address">
                                    <label class="control-label mb-0" for="rec_home_address">
                                        Home Address <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your job title, for example "Manager".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rec_home_address') ? ' has-error' : '' }}" id="grp-rec_home_address">
                                    <textarea class="form-control" id="rec_home_address" name="rec_home_address" rows="3">{{old('rec_home_address')? old('rec_home_address') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-rec_home_address">{{ $errors->first('rec_home_address') }}</strong>
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