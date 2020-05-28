<h3><i class="fa fa-home" aria-hidden="true"></i></h3>
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
                            <th>Total Income (TTD)</th>
                            <th>
                                <button class="btn btn-sm btn-success add_household" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="household_tbody">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext nameField" value="{{old('first_name') || old('surname')? old('first_name').' '.old('surname') : '' }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender1" name="hi_gender[1]" class="custom-control-input hi_gender_male" value="male" {{old('gender') == 'male'? 'checked' : '' }} disabled="">
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender2" name="hi_gender[1]" class="custom-control-input hi_gender_female" value="female" {{old('gender') == 'female'? 'checked' : '' }} disabled="">
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext" value="Self">
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('hi_dob.1') ? ' has-error' : '' }}" id="grp-hi_dob_1">
                                    <input type="text" class="form-control form-control-sm dob" id="hi_dob_1" name="hi_dob[1]" aria-describedby="" value="{{old('hi_dob.1')? old('hi_dob.1') : '' }}" required placeholder="yyyy-mm-dd">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_dob.1">{{ $errors->first('hi_dob.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext" id="hi_emp_classification" value="{{old('emp_classification')}}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('hi_income.1') ? ' has-error' : '' }}" id="grp-hi_income_1">
                                    <input type="number" min="0" step="1" class="form-control form-control-sm hi_income" id="hi_income_1" name="hi_income[1]" aria-describedby="" value="{{old('hi_income.1')? old('hi_income.1') : '' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_income.1">{{ $errors->first('hi_income.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td></td>
                        </tr>

                        @if (old('hi_dob'))
                            @foreach (old('hi_dob') as $key => $item)
                                @if ($key != 1)
                                <tr id="household_row_{{$key}}">
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_name.'.$key) ? ' has-error' : '' }}" id="grp-hi_name.{{$key}}">
                                            <input type="text" class="form-control form-control-sm hi_name" id="hi_name_{{$key}}" name="hi_name[{{$key}}]" aria-describedby="" value="{{old('hi_name.'.$key)? old('hi_name.'.$key) : '' }}" required>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_name.{{$key}}">{{ $errors->first('hi_name.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_gender.'.$key) ? ' has-error' : '' }}" id="grp-hi_gender.{{$key}}">
                                            {{old('hi_gender.'.$key)}}
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="hi_gender_{{$key}}_1" name="hi_gender[{{$key}}]" class="custom-control-input" value="male" {{old('hi_gender.'.$key) == 'male'? 'checked' : '' }}>
                                                <label class="custom-control-label" for="hi_gender_{{$key}}_1">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="hi_gender_{{$key}}_2" name="hi_gender[{{$key}}]" class="custom-control-input" value="female" {{old('hi_gender.'.$key) == 'female'? 'checked' : '' }}>
                                                <label class="custom-control-label" for="hi_gender_{{$key}}_2">Female</label>
                                            </div>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_gender.{{$key}}">{{ $errors->first('hi_gender.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_relationship.'.$key) ? ' has-error' : '' }}" id="grp-hi_relationship.{{$key}}">
                                            <input type="text" class="form-control form-control-sm" id="hi_relationship_{{$key}}" name="hi_relationship[{{$key}}]" aria-describedby="" value="{{old('hi_relationship.'.$key)? old('hi_relationship.'.$key) : '' }}" required>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_relationship.{{$key}}">{{ $errors->first('hi_relationship.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_dob.'.$key) ? ' has-error' : '' }}" id="grp-hi_dob.{{$key}}">
                                            <input type="text" class="form-control form-control-sm" id="hi_dob_{{$key}}" name="hi_dob[{{$key}}]" aria-describedby="" value="{{old('hi_dob.'.$key)? old('hi_dob.'.$key) : '' }}" required placeholder="yyyy-mm-dd">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_dob.{{$key}}">{{ $errors->first('hi_dob.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_emp_status.'.$key) ? ' has-error' : '' }}" id="grp-hi_emp_status.{{$key}}">
                                            <input type="text" class="form-control form-control-sm" id="hi_emp_status_{{$key}}" name="hi_emp_status[{{$key}}]" aria-describedby="" value="{{old('hi_emp_status.'.$key)? old('hi_emp_status.'.$key) : '' }}" required>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_emp_status.{{$key}}">{{ $errors->first('hi_emp_status.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_income.'.$key) ? ' has-error' : '' }}" id="grp-hi_income.{{$key}}">
                                            <input type="number" min="0" step="{{$key}}" class="form-control form-control-sm hi_income" id="hi_income_{{$key}}" name="hi_income[{{$key}}]" aria-describedby="" value="{{old('hi_income.'.$key)? old('hi_income.'.$key) : '0' }}" required>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_income.{{$key}}">{{ $errors->first('hi_income.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary del_household" type="button" num="{{$key}}"><i class="fa fa-remove" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        
                        <tr>
                            <th colspan="5" class="align-middle">
                                <p class="text-muted text-right">
                                    Total:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" readonly="" class="form-control-plaintext" id="hi_total_income" value="{{old('hi_income')? number_format(array_sum(old('hi_income')), 2) : '0.00'}}">
                                    
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
                                <p class="text-right mb-0 {{$errors->has('hi_total_before')? 'text-primary' : ''}}">
                                    Total income before retrenchment/ termination/ reduction in income <span class="red">*</span>:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('hi_total_before') ? ' has-error' : '' }} mb-0" id="grp-hi_total_before">
                                    <input type="text" class="form-control" id="hi_total_before" name="hi_total_before" required value="{{old('hi_total_before')}}">
                                    
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