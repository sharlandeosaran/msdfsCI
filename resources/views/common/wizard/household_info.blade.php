<h3><i class="fa fa-users" aria-hidden="true" title="Household Information"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-household">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="householdInfoSection"></span>: Household Information</h5>
            {{-- <h2 class="section-heading">Select business type </h2> --}}
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th>
                                Name <span class="red">*</span> 
                                <i class="fa fa-info-circle" aria-hidden="true" title='State the first name and surname of the person stated in the row.'></i>
                            </th>
                            <th>
                                National ID 
                                <i class="fa fa-info-circle" aria-hidden="true" title=''></i>
                            </th>
                            <th>
                                Gender <span class="red">*</span> 
                                <i class="fa fa-info-circle" aria-hidden="true" title='Select the gender of the person stated in the row.'></i>
                            </th>
                            <th>
                                Relationship to Applicant <span class="red">*</span> 
                                <i class="fa fa-info-circle" aria-hidden="true" title='State the connection to the applicant of each person listed as part of the household. '></i>
                            </th>
                            <th>
                                Date of Birth <span class="red">*</span> 
                                <i class="fa fa-info-circle" aria-hidden="true" title='State the date of birth of the person stated in the row in the format yyyy-mm-dd.'></i>
                            </th>
                            <th>
                                Employment Status <span class="red">*</span> 
                                <i class="fa fa-info-circle" aria-hidden="true" title='State current employment status of the person stated in the row, for example "Unemployed".'></i>
                            </th>
                            <th>
                                Total Income (TTD) <span class="red">*</span> 
                                <i class="fa fa-info-circle" aria-hidden="true" title='State total monthly income in Trinidad and Tobago (TT) dollars. If you are a daily paid worker, please state the average income received in a month in TT dollars. Please note the grant is for households with a total income equal to or less than TT$10,000.'></i>
                            </th>
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
                                    <input type="text" readonly="" class="form-control-plaintext nationalIDField" value="{{old('national_id')}}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender1" name="hi_gender_1" class="custom-control-input hi_gender_M" value="M" {{old('gender') == 'M'? 'checked' : '' }} disabled="">
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender2" name="hi_gender_1" class="custom-control-input hi_gender_F" value="F" {{old('gender') == 'F'? 'checked' : '' }} disabled="">
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext" value="Applicant">
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('hi_dob.1') ? ' has-error' : '' }} grp-hi_dob_1">
                                    <input type="text" class="form-control form-control-sm dob" id="hi_dob_1" name="hi_dob[1]" aria-describedby="" value="{{old('hi_dob.1')? old('hi_dob.1') : '' }}" required placeholder="yyyy-mm-dd">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_dob_1">{{ $errors->first('hi_dob.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext" id="hi_emp_classification" value="{{old('emp_classification')}}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group{{ $errors->has('hi_income.1') ? ' has-error' : '' }} grp-hi_income_1">
                                    <input type="number" min="0" step="1" class="form-control form-control-sm hi_income" id="hi_income_1" name="hi_income[1]" aria-describedby="" value="{{old('hi_income.1')? old('hi_income.1') : '0' }}" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_income_1">{{ $errors->first('hi_income.1') }}</strong>
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
                                        <div class="form-group{{ $errors->has('hi_first_name.'.$key) ? ' has-error' : '' }} grp-hi_first_name_{{$key}}"  style="margin-bottom: 0;">
                                            <input type="text" class="form-control form-control-sm hi_first_name" id="hi_first_name_{{$key}}" name="hi_first_name[{{$key}}]" aria-describedby="" value="{{old('hi_first_name.'.$key)? old('hi_first_name.'.$key) : '' }}" required maxlength="100" placeholder="First Name">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_first_name_{{$key}}">{{ $errors->first('hi_first_name.'.$key) }}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group{{ $errors->has('hi_surname.'.$key) ? ' has-error' : '' }} grp-hi_surname_{{$key}}" style="margin-bottom: 0;">
                                            <input type="text" class="form-control form-control-sm hi_surname" id="hi_surname_{{$key}}" name="hi_surname[{{$key}}]" aria-describedby="" value="{{old('hi_surname.'.$key)? old('hi_surname.'.$key) : '' }}" required maxlength="100" placeholder="Surname">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_surname_{{$key}}">{{ $errors->first('hi_surname.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_national_id.'.$key) ? ' has-error' : '' }} grp-hi_national_id_{{$key}}">
                                            <input type="text" class="form-control form-control-sm" id="hi_national_id_{{$key}}" name="hi_national_id[{{$key}}]" aria-describedby="" value="{{old('hi_national_id.'.$key)? old('hi_national_id.'.$key) : '' }}" maxlength="11">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_national_id_{{$key}}">{{ $errors->first('hi_national_id.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_gender.'.$key) ? ' has-error' : '' }} grp-hi_gender_{{$key}}">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" gender="hi_gender_{{$key}}" id="hi_gender_{{$key}}_1" name="hi_gender[{{$key}}]" class="custom-control-input" value="M" {{old('hi_gender.'.$key) == 'M'? 'checked' : '' }}>
                                                <label class="custom-control-label" for="hi_gender_{{$key}}_1">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" gender="hi_gender_{{$key}}" id="hi_gender_{{$key}}_2" name="hi_gender[{{$key}}]" class="custom-control-input" value="F" {{old('hi_gender.'.$key) == 'F'? 'checked' : '' }}>
                                                <label class="custom-control-label" for="hi_gender_{{$key}}_2">Female</label>
                                            </div>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_gender_{{$key}}">{{ $errors->first('hi_gender.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_relationship.'.$key) ? ' has-error' : '' }} grp-hi_relationship_{{$key}}">
                                            <select class="form-control form-control-sm chosen-select hi_relationship" num="{{$key}}" id="hi_relationship_{{$key}}" name="hi_relationship[{{$key}}]">
                                                <option disabled="" selected="">select...</option>
                                                @php $other = 'Other'; $otherid = ''; @endphp
                                                @foreach ($relationships as $relationship)
                                                    @if ($relationship->id !== 0)
                                                        @if ($relationship->relationship !== 'Other')
                                                            <option {{old('hi_relationship.'.$key) == $relationship->id? 'selected' : '' }} value="{{$relationship->id}}">{{$relationship->relationship}}</option>
                                                        @else
                                                            @php $other = $relationship->relationship; $otherid = $relationship->id; @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
            
                                                <option {{old('hi_relationship.'.$key) == $otherid? 'selected' : '' }} value="{{$otherid}}">{{$other}}</option>
                                            </select>
                                            <input type="text" class="form-control form-control-sm {{old('hi_relationship.'.$key) == $otherid? '' : 'hide' }}" id="hi_relationship_other_{{$key}}" name="hi_relationship_other[{{$key}}]" aria-describedby="" value="{{old('hi_relationship_other.'.$key)? old('hi_relationship_other.'.$key) : '' }}" required maxlength="100" placeholder="Other relationship">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_relationship_{{$key}}">{{ $errors->first('hi_relationship.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_dob.'.$key) ? ' has-error' : '' }} grp-hi_dob_{{$key}}">
                                            <input type="text" class="form-control form-control-sm dob" id="hi_dob_{{$key}}" name="hi_dob[{{$key}}]" aria-describedby="" value="{{old('hi_dob.'.$key)? old('hi_dob.'.$key) : '' }}" required placeholder="yyyy-mm-dd">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_dob_{{$key}}">{{ $errors->first('hi_dob.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_emp_status.'.$key) ? ' has-error' : '' }} grp-hi_emp_status_{{$key}}">
                                            <select class="form-control chosen-select hi_emp_status" num="{{$key}}" id="hi_emp_status_{{$key}}" name="hi_emp_status[{{$key}}]">
                                                <option disabled="" selected="">select...</option>
                                                @php $other = 'Other'; $otherid = ''; @endphp
                                                @foreach ($employment_status as $status)
                                                    @if ($status->status !== 'Other')
                                                        <option {{old('hi_emp_status.'.$key) == $status->id? 'selected' : '' }} value="{{$status->id}}">{{$status->status}}</option>
                                                    @else
                                                        @php $other = $status->status; $otherid = $status->id; @endphp
                                                    @endif
                                                @endforeach
            
                                                <option {{old('hi_emp_status.'.$key) == $otherid? 'selected' : '' }} value="{{$otherid}}">{{$other}}</option>
                                            </select>
                                            <input type="text" class="form-control hi_emp_status_other {{old('hi_emp_status_other.'.$key)? (old('hi_emp_status.'.$key) == $otherid? '' : 'hide') : 'hide' }}" id="hi_emp_status_other_{{$key}}" name="hi_emp_status_other[{{$key}}]" aria-describedby="" value="{{old('hi_emp_status_other.'.$key)? old('hi_emp_status_other.'.$key) : '' }}" required maxlength="100" placeholder="Other employment status">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_emp_status_{{$key}}">{{ $errors->first('hi_emp_status.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('hi_income.'.$key) ? ' has-error' : '' }} grp-hi_income_{{$key}}">
                                            <input type="number" min="0" step="1" class="form-control form-control-sm hi_income" id="hi_income_{{$key}}" name="hi_income[{{$key}}]" aria-describedby="" value="{{old('hi_income.'.$key)? old('hi_income.'.$key) : '0' }}" required>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_income_{{$key}}">{{ $errors->first('hi_income.'.$key) }}</strong>
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
                            <th colspan="6" class="align-middle">
                                <p class="text-muted text-right">
                                    Total:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('hi_total_income') ? ' has-error' : '' }}">
                                    <input type="text" readonly="" class="form-control-plaintext" id="hi_total_income" name="hi_total_income" value="{{old('hi_total_income')? old('hi_total_income') : '0.00'}}">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_total_income">{{ $errors->first('hi_total_income') }}</strong>
                                    </span>
                                </div>
                            </th>
                            <th>
                                <button class="btn btn-sm btn-success add_household" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                        <tr style="background-color: rgba(0,0,0,0.05);">
                            <th colspan="6">
                                <p class="text-right mb-0 {{$errors->has('hi_total_before')? 'text-primary' : ''}}">
                                    Total income before retrenchment/ termination/ reduction in income <span class="red">*</span> 
                                    <i class="fa fa-info-circle" aria-hidden="true" title='The income before is only required for the main applicant on behalf of the household even if more than one person may be impacted. Please state your income before retrenchment, termination or reduction of income.'></i>:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('hi_total_before') ? ' has-error' : '' }} mb-0 grp-hi_total_before">
                                    <input type="number" min="0" step="1" class="form-control" id="hi_total_before" name="hi_total_before" required value="{{old('hi_total_before')}}">
                                    
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