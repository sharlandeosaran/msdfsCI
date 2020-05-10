<h3><i class="fa fa-dollar" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Step 3: Total Income</h5>
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
                                <button class="btn btn-sm btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('organization_type') ? ' has-error' : '' }}" id="grp-organization_type">
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender1" name="income_gender_1" class="custom-control-input">
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender2" name="income_gender_1" class="custom-control-input">
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-organization_type">{{ $errors->first('organization_type') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" aria-describedby="" value="{{old('name')? old('name') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-remove" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p class="text-muted text-right">
                                    Total income before retrenchment/ termination/ reduction in income:
                                </p>
                            </td>
                            <td colspan="2">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="grp-name">
                                    <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="0.00">
                                    
                                    <span class="help-block">
                                        <strong id="err-name">{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>