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
                                Full Name <span class="red">*</span> 
                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State the first name and surname of the person stated in the row.'></i>
                            </th>
                            <th>
                                Gender <span class="red">*</span> 
                                <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the gender of the person stated in the row.'></i>
                            </th>
                            <th>
                                Relationship to Applicant <span class="red">*</span> 
                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State the connection to the applicant of each person listed as part of the household. '></i>
                            </th>
                            <th>
                                Date of Birth <span class="red">*</span> 
                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State the date of birth of the person stated in the row in the format yyyy-mm-dd.'></i>
                            </th>
                            <th>
                                Employment Status <span class="red">*</span> 
                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State current employment status of the person stated in the row, for example "Unemployed".'></i>
                            </th>
                            <th>
                                National ID 
                                <i class="fa fa-info-circle hide" aria-hidden="true" title=''></i>
                            </th>
                            <th>
                                <button class="btn btn-sm btn-success critical_add_household" type="button" title="Add household member"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="household_tbody">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext nameField" value="{{old('hi_first_name.1') || old('hi_surname.1')? old('hi_first_name.1').' '.old('hi_surname.1') : '' }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender1" name="hi_gender_show[1]" class="custom-control-input hi_gender_M" value="M" {{old('hi_gender.1') == 'M'? 'checked' : '' }} disabled="">
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gender2" name="hi_gender_show[1]" class="custom-control-input hi_gender_F" value="F" {{old('hi_gender.1') == 'F'? 'checked' : '' }} disabled="">
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control form-control-sm chosen-select hi_relationship" num="1" id="hi_relationship_1" name="hi_relationship[1]">
                                        <option value="0" selected="">{{$relationships[0]->relationship}}</option>
                                    </select>
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
                                <div class="form-group{{ $errors->has('hi_emp_status.1') ? ' has-error' : '' }} grp-hi_emp_status_1" id="">
                                    <select class="form-control form-control-sm chosen-select hi_emp_status" num="1" id="hi_emp_status_1" name="hi_emp_status[1]">
                                        <option disabled="" selected="">select...</option>
                                        @php $other = 'Other'; $otherid = ''; @endphp
                                        @foreach ($employment_status as $status)
                                            @if ($status->status !== 'Other')
                                                <option {{old('hi_emp_status.1') == $status->id? 'selected' : '' }} value="{{$status->id}}">{{$status->status}}</option>
                                            @else
                                                @php $other = $status->status; $otherid = $status->id; @endphp
                                            @endif
                                        @endforeach
    
                                        <option {{old('hi_emp_status.1') == $otherid? 'selected' : '' }} value="{{$otherid}}">{{$other}}</option>
                                    </select>
                                    <input type="text" class="form-control form-control-sm hi_emp_status_other {{old('hi_emp_status_other.1')? (old('hi_emp_status.1') == $otherid? '' : 'hide') : 'hide' }}" id="hi_emp_status_other_1" name="hi_emp_status_other[1]" aria-describedby="" value="{{old('hi_emp_status_other.1')? old('hi_emp_status_other.1') : '' }}" required maxlength="100" placeholder="Other employment status">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_emp_status_1">{{ $errors->first('hi_emp_status.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" readonly="" class="form-control-plaintext nationalIDField" value="{{old('hi_national_id.1')}}">
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
                                            <select class="form-control form-control-sm chosen-select hi_emp_status" num="{{$key}}" id="hi_emp_status_{{$key}}" name="hi_emp_status[{{$key}}]">
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
                                            <input type="text" class="form-control form-control-sm {{old('hi_emp_status.'.$key) == $otherid? '' : 'hide' }}" id="hi_emp_status_other_{{$key}}" name="hi_emp_status_other[{{$key}}]" aria-describedby="" value="{{old('hi_emp_status_other.'.$key)? old('hi_emp_status_other.'.$key) : '' }}" required maxlength="100" placeholder="Other employment status">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_emp_status_{{$key}}">{{ $errors->first('hi_emp_status.'.$key) }}</strong>
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
                                        <button class="btn btn-sm btn-primary del_household" type="button" num="{{$key}}"><i class="fa fa-remove" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr style="background-color: rgba(0,0,0,0.05);">
                            <th colspan="5">
                                <p class="text-right mb-0 {{$errors->has('hi_total_income')? 'text-primary' : ''}}">
                                    Total Household Income <span class="red">*</span> 
                                    <i class="fa fa-info-circle hide" aria-hidden="true" title='The income before is only required for the main applicant on behalf of the household even if more than one person may be impacted. Please state your income before retrenchment, termination or reduction of income.'></i>:
                                </p>
                            </th>
                            <th>
                                <div class="form-group{{ $errors->has('hi_total_income') ? ' has-error' : '' }} grp-hi_total_income">
                                    <select class="form-control form-control-sm chosen-select" id="hi_total_income" name="hi_total_income">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($total_income as $income)
                                        <option {{old('hi_total_income') == $income->id? 'selected' : '' }} value="{{$income->id}}">{{$income->income}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_total_income">{{ $errors->first('hi_total_income') }}</strong>
                                    </span>
                                </div>
                            </th>
                            <th>
                                <button class="btn btn-sm btn-success critical_add_household" type="button" title="Add household member"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>