<h3><i class="fa fa-dollar" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="householdInfoSection"></span>: Household Information</h5>
            {{-- <h2 class="section-heading">Select business type </h2> --}}
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Relationship to Applicant</th>
                            <th>Date of Birth</th>
                            <th>Employment Status</th>
                            <th>Total Income</th>
                            <th>
                                <button class="btn btn-sm btn-success add_household" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="household_tbody">
                        <tr>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="hi_name_1" name="hi_name[1]" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('organization_type') ? ' has-error' : '' }}" id="grp-organization_type">
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender1" name="hi_gender[1]" class="custom-control-input" value="male">
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender2" name="hi_gender[1]" class="custom-control-input" value="female">
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-organization_type">{{ $errors->first('organization_type') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="hi_relationship_1" name="hi_relationship[1]" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="hi_dob_1" name="hi_dob[1]" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="hi_emp_status_1" name="hi_emp_status[1]" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm hi_income" id="hi_income_1" name="hi_income[1]" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                        <tr>
                            <th colspan="5" class="align-middle">
                                <p class="text-muted text-right">
                                    Total:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" readonly="" class="form-control-plaintext" id="hi_total_income" value="0.00">
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </th>
                            <th>
                                <button class="btn btn-sm btn-success add_household" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5">
                                <p class="text-muted text-right mb-0">
                                    Total income before retrenchment/ termination/ reduction in income:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('hi_total_before') ? ' has-error' : '' }} mb-0" id="grp-hi_total_before">
                                    <input type="text" class="form-control" id="hi_total_before" name="hi_total_before" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_total_before">{{ $errors->first('hi_total_before') }}</strong>
                                    </span>
                                </div>
                            </th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>