<h3><i class="fa fa-building" aria-hidden="true" title="Employer Information"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-employer">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="employerInfoSection"></span>: Employer Information</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('emp_name') ? ' has-error' : '' }}" id="grp-emp_name">
                                    <label class="control-label mb-0" for="emp_name">
                                        Employer/ Business Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true"title='State the name of the business or company for which you worked, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <input type="text" class="form-control" id="emp_name" name="emp_name" aria-describedby="" value="{{old('emp_name')? old('emp_name') : '' }}" required maxlength="100">
                                
                                <span class="help-block">
                                    <strong id="err-emp_name">{{ $errors->first('emp_name') }}</strong>
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('emp_address') ? ' has-error' : '' }}" id="grp-emp_address">
                                    <label class="control-label mb-0" for="emp_address">
                                        Business/ Mailing Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true"title='State the address of business / company or where you last went to work.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <textarea class="form-control" id="emp_address" name="emp_address" rows="3" maxlength="250">{{old('emp_address')? old('emp_address') : '' }}</textarea>
                                
                                <span class="help-block">
                                    <strong id="err-emp_address">{{ $errors->first('emp_address') }}</strong>
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('emp_auth_person') ? ' has-error' : '' }}" id="grp-emp_auth_person">
                                    <label class="control-label mb-0" for="emp_auth_person">
                                        Authorised Person <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true"title='State the name of an authorize person of the company like CEO, Managing director or Owner, for example "Bill Gates".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <input type="text" class="form-control" id="emp_auth_person" name="emp_auth_person" aria-describedby="" value="{{old('emp_auth_person')? old('emp_auth_person') : '' }}" required maxlength="100">
                                
                                <span class="help-block">
                                    <strong id="err-emp_auth_person">{{ $errors->first('emp_auth_person') }}</strong>
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('emp_contact') ? ' has-error' : '' }}" id="grp-emp_contact">
                                    <label class="control-label mb-0" for="emp_contact">
                                        Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true"title='State the contact number for the business/company.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <input type="text" class="form-control" id="emp_contact" name="emp_contact" aria-describedby="" value="{{old('emp_contact')? old('emp_contact') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                
                                <span class="help-block">
                                    <strong id="err-emp_contact">{{ $errors->first('emp_contact') }}</strong>
                                </span>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</section>