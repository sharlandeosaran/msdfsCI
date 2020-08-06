<h3><i class="fa fa-users" aria-hidden="true" title="Household Information"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-household">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="householdInfoSection"></span>: Household Information</h5>
            <h3 class="">
                <span id="hi_count">{{old('hi_dob')? (count(old('hi_dob')) == 1? '1 Person' : count(old('hi_dob')).' Persons') : '1 Person' }}</span> in Household  <button class="btn btn-sm btn-success critical_add_household pull-right" type="button"><i class="fa fa-plus" aria-hidden="true"></i> add member</button>
            </h3>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p> --}}
            
            <div class="table-responsive household_row">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr class=" table-active text-center">
                            <td colspan="2">Applicant</td>
                        </tr>
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_first_name.1') ? ' has-error' : '' }} grp-hi_first_name_1">
                                    <label class="control-label mb-0" for="hi_first_name_1">
                                        First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your first name as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_first_name.1') ? ' has-error' : '' }} grp-hi_first_name_1">
                                    <input type="text" class="form-control hi_name" id="hi_first_name_1" name="hi_first_name[1]" applicant="1" aria-describedby="" value="{{old('hi_first_name.1')? old('hi_first_name.1') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_first_name_1">{{ $errors->first('hi_first_name.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_surname.1') ? ' has-error' : '' }} grp-hi_surname_1">
                                    <label class="control-label mb-0" for="hi_surname_1">
                                        Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your hi_surname as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_surname.1') ? ' has-error' : '' }} grp-hi_surname_1">
                                    <input type="text" class="form-control hi_name" id="hi_surname_1" name="hi_surname[1]" applicant="1" aria-describedby="" value="{{old('hi_surname.1')? old('hi_surname.1') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_surname_1">{{ $errors->first('hi_surname.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('othername') ? ' has-error' : '' }} grp-othername">
                                    <label class="control-label mb-0" for="othername">
                                        Other Name(s) 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your hi_surname as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('othername') ? ' has-error' : '' }} grp-othername">
                                    <input type="text" class="form-control hi_name" id="othername" name="othername" applicant="1" aria-describedby="" value="{{old('othername')? old('othername') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-othername">{{ $errors->first('othername') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_gender.1') ? ' has-error' : '' }} grp-hi_gender_1">
                                    <label class="control-label mb-0" for="hi_gender_1">
                                        Gender <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your first name as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>

                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_gender.1') ? ' has-error' : '' }} grp-hi_gender_1">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" gender="hi_gender_1" id="hi_gender_1_1" name="hi_gender[1]" class="custom-control-input" value="M" {{old('hi_gender.1') == 'M'? 'checked' : '' }}>
                                                <label class="custom-control-label" for="hi_gender_1_1">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" gender="hi_gender_1" id="hi_gender_1_2" name="hi_gender[1]" class="custom-control-input" value="F" {{old('hi_gender.1') == 'F'? 'checked' : '' }}>
                                                <label class="custom-control-label" for="hi_gender_1_2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_gender_1">{{ $errors->first('hi_gender.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('marital_status') ? ' has-error' : '' }} grp-marital_status">
                                    <label class="control-label mb-0" for="marital_status">
                                        Marital Status <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State the date of birth of the person stated in the row in the format yyyy-mm-dd.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('marital_status') ? ' has-error' : '' }} grp-marital_status">
                                    <select class="form-control chosen-select" id="marital_status" name="marital_status">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($marital_status as $status)
                                        <option {{old('marital_status') == $status->id? 'selected' : '' }} value="{{$status->id}}">{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-marital_status">{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_dob.1') ? ' has-error' : '' }} grp-hi_dob_1">
                                    <label class="control-label mb-0" for="hi_dob_1">
                                        Date of Birth <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State the date of birth of the person stated in the row in the format yyyy-mm-dd.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_dob.1') ? ' has-error' : '' }} grp-hi_dob_1">
                                    <input type="text" class="form-control dob" id="hi_dob_1" name="hi_dob[1]" aria-describedby="" value="{{old('hi_dob.1')? old('hi_dob.1') : '' }}" required placeholder="yyyy-mm-dd">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_dob_1">{{ $errors->first('hi_dob.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_national_id.1') ? ' has-error' : '' }} grp-hi_national_id_1">
                                    <label class="control-label mb-0" for="hi_national_id_1">
                                        National Identification Card Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your national identification card number, for example "20000101001". Also select what proof you have for your national identification card. The document supplied must have the national identification number present.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_national_id.1') ? ' has-error' : '' }} grp-hi_national_id_1">
                                    
                                    <input type="text" pattern="[0-9]{11}" maxlength="11" class="form-control" id="hi_national_id_1" name="hi_national_id[1]" aria-describedby="" value="{{old('hi_national_id.1')? old('hi_national_id.1') : '' }}" required placeholder="xxxxxxxxxxx">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_national_id_1">{{ $errors->first('hi_national_id.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('national_id_state') ? ' has-error' : '' }} grp-national_id_state">
                                    <label class="control-label mb-0" for="national_id_state">
                                        National Identification Card Condition <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your national identification card number, for example "20000101001". Also select what proof you have for your national identification card. The document supplied must have the national identification number present.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('national_id_state') ? ' has-error' : '' }} grp-national_id_state">
                                    
                                    <select class="form-control" id="national_id_state" name="national_id_state">
                                        {{-- <option selected="" value="">select...</option> --}}
                                        @foreach ($id_state as $state)
                                        <option {{old('national_id_state') == $state->id? 'selected' : '' }} value="{{$state->id}}">{{$state->id_state}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-national_id_state">{{ $errors->first('national_id_state') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('drivers_permit') ? ' has-error' : '' }} grp-drivers_permit">
                                    <label class="control-label mb-0" for="drivers_permit">
                                        Driver's Permit 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide your national insurance number (drivers_permit) if applicable, for example "2000010".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('drivers_permit') ? ' has-error' : '' }} grp-drivers_permit">
                                    <input type="text" class="form-control" id="drivers_permit" name="drivers_permit" aria-describedby="" value="{{old('drivers_permit')? old('drivers_permit') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-drivers_permit">{{ $errors->first('drivers_permit') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('passport') ? ' has-error' : '' }} grp-passport">
                                    <label class="control-label mb-0" for="passport">
                                        Passport 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide your national insurance number (passport) if applicable, for example "2000010".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('passport') ? ' has-error' : '' }} grp-passport">
                                    <input type="text" class="form-control" id="passport" name="passport" aria-describedby="" value="{{old('passport')? old('passport') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-passport">{{ $errors->first('passport') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_relationship.1') ? ' has-error' : '' }} grp-hi_relationship_1">
                                    <label class="control-label mb-0" for="hi_relationship_1">
                                        Relationship to Applicant <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide your national insurance number (passport) if applicable, for example "2000010".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_relationship.1') ? ' has-error' : '' }} grp-hi_relationship_1">
                                    <select class="form-control chosen-select hi_relationship" num="1" id="hi_relationship_1" name="hi_relationship[1]">
                                        <option value="0" selected="">{{$relationships[0]->relationship}}</option>
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_relationship_1">{{ $errors->first('hi_relationship.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_emp_status.1') ? ' has-error' : '' }} grp-hi_emp_status_1">
                                    <label class="control-label mb-0" for="hi_emp_status_1">
                                        Employment Status <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide your national insurance number (passport) if applicable, for example "2000010".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('hi_emp_status.1') ? ' has-error' : '' }} grp-hi_emp_status_1" id="">
                                    <select class="form-control chosen-select hi_emp_status" num="1" id="hi_emp_status_1" name="hi_emp_status[1]">
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
                                    <input type="text" class="form-control hi_emp_status_other {{old('hi_emp_status_other.1')? (old('hi_emp_status.1') == $otherid? '' : 'hide') : 'hide' }}" id="hi_emp_status_other_1" name="hi_emp_status_other[1]" aria-describedby="" value="{{old('hi_emp_status_other.1')? old('hi_emp_status_other.1') : '' }}" required maxlength="100" placeholder="Other employment status">
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_emp_status_1">{{ $errors->first('hi_emp_status.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('primary_mobile_contact') ? ' has-error' : '' }} grp-primary_mobile_contact">
                                    <label class="control-label mb-0" for="primary_mobile_contact">
                                        Primary Mobile Contact <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('primary_mobile_contact') ? ' has-error' : '' }} grp-primary_mobile_contact">
                                    <input type="text" class="form-control phone" id="primary_mobile_contact" name="primary_mobile_contact" aria-describedby="" value="{{old('primary_mobile_contact')? old('primary_mobile_contact') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-primary_mobile_contact">{{ $errors->first('primary_mobile_contact') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('secondary_mobile_contact') ? ' has-error' : '' }} grp-secondary_mobile_contact">
                                    <label class="control-label mb-0" for="secondary_mobile_contact">
                                        Secondary Mobile Contact 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('secondary_mobile_contact') ? ' has-error' : '' }} grp-secondary_mobile_contact">
                                    <input type="text" class="form-control phone" id="secondary_mobile_contact" name="secondary_mobile_contact" aria-describedby="" value="{{old('secondary_mobile_contact')? old('secondary_mobile_contact') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-secondary_mobile_contact">{{ $errors->first('secondary_mobile_contact') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('land_line_telephone_contact') ? ' has-error' : '' }} grp-land_line_telephone_contact">
                                    <label class="control-label mb-0" for="land_line_telephone_contact">
                                        Land Line Telephone Contact 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('land_line_telephone_contact') ? ' has-error' : '' }} grp-land_line_telephone_contact">
                                    <input type="text" class="form-control phone" id="land_line_telephone_contact" name="land_line_telephone_contact" aria-describedby="" value="{{old('land_line_telephone_contact')? old('land_line_telephone_contact') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-land_line_telephone_contact">{{ $errors->first('land_line_telephone_contact') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            @if (old('hi_dob'))
                @foreach (old('hi_dob') as $key => $item)
                    @if ($key != 1)
                    <div class="table-responsive household_row travel_hi_row" id="household_row_{{$key}}">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr class=" table-active text-center">
                                    <td colspan="2">Person # {{$key}} <button class="btn btn-sm btn-primary del_household pull-right" type="button" num="{{$key}}"><i class="fa fa-remove" aria-hidden="true"></i> remove member</button></td>
                                </tr>
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_first_name.'.$key) ? ' has-error' : '' }} grp-hi_first_name_{{$key}}">
                                            <label class="control-label mb-0" for="hi_first_name_{{$key}}">
                                                First Name <span class="red">*</span> 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State your first name as indicated on your identification card.'></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="80%">
                                        <div class="form-group mb-0{{ $errors->has('hi_first_name.'.$key) ? ' has-error' : '' }} grp-hi_first_name_{{$key}}">
                                            <input type="text" class="form-control hi_name" id="hi_first_name_{{$key}}" name="hi_first_name[{{$key}}]" applicant="{{$key}}" aria-describedby="" value="{{old('hi_first_name.'.$key)? old('hi_first_name.'.$key) : '' }}" required maxlength="50">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_first_name_{{$key}}">{{ $errors->first('hi_first_name.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_surname.'.$key) ? ' has-error' : '' }} grp-hi_surname_{{$key}}">
                                            <label class="control-label mb-0" for="hi_surname_{{$key}}">
                                                Surname <span class="red">*</span> 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State your hi_surname as indicated on your identification card.'></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="80%">
                                        <div class="form-group mb-0{{ $errors->has('hi_surname.'.$key) ? ' has-error' : '' }} grp-hi_surname_{{$key}}">
                                            <input type="text" class="form-control hi_name" id="hi_surname_{{$key}}" name="hi_surname[{{$key}}]" applicant="{{$key}}" aria-describedby="" value="{{old('hi_surname.'.$key)? old('hi_surname.'.$key) : '' }}" required maxlength="50">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_surname_{{$key}}">{{ $errors->first('hi_surname.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_gender.'.$key) ? ' has-error' : '' }} grp-hi_gender_{{$key}}">
                                            <label class="control-label mb-0" for="hi_gender_{{$key}}">
                                                Gender <span class="red">*</span> 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State your first name as indicated on your identification card.'></i>
                                            </label>
                                        </div>
                                    </td>

                                    <td width="80%">
                                        <div class="form-group mb-0{{ $errors->has('hi_gender.'.$key) ? ' has-error' : '' }} grp-hi_gender_{{$key}}">
                                            <div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" gender="hi_gender_{{$key}}" id="hi_gender_{{$key}}_1" name="hi_gender[{{$key}}]" class="custom-control-input" value="M" {{old('hi_gender.'.$key) == 'M'? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="hi_gender_{{$key}}_1">Male</label>
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" gender="hi_gender_{{$key}}" id="hi_gender_{{$key}}_2" name="hi_gender[{{$key}}]" class="custom-control-input" value="F" {{old('hi_gender.'.$key) == 'F'? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="hi_gender_{{$key}}_2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_gender_{{$key}}">{{ $errors->first('hi_gender.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_dob.'.$key) ? ' has-error' : '' }} grp-hi_dob_{{$key}}">
                                            <label class="control-label mb-0" for="hi_dob-1">
                                                Date of Birth <span class="red">*</span> 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State the date of birth of the person stated in the row in the format yyyy-mm-dd.'></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="80%">
                                        <div class="form-group mb-0{{ $errors->has('hi_dob.'.$key) ? ' has-error' : '' }} grp-hi_dob_{{$key}}">
                                            <input type="text" class="form-control dob" id="hi_dob_{{$key}}" name="hi_dob[{{$key}}]" aria-describedby="" value="{{old('hi_dob.'.$key)? old('hi_dob.'.$key) : '' }}" required placeholder="yyyy-mm-dd">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_dob_{{$key}}">{{ $errors->first('hi_dob.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                        
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_national_id.'.$key) ? ' has-error' : '' }} grp-hi_national_id_{{$key}}">
                                            <label class="control-label mb-0" for="hi_national_id_{{$key}}">
                                                National Identification Card Number 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='State your national identification card number, for example "20000101001". Also select what proof you have for your national identification card. The document supplied must have the national identification number present.'></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="80%">
                                        <div class="form-group mb-0{{ $errors->has('hi_national_id.'.$key) ? ' has-error' : '' }} grp-hi_national_id_{{$key}}">

                                            <input type="text" pattern="[0-9]{11}" maxlength="11" class="form-control" id="hi_national_id_{{$key}}" name="hi_national_id[{{$key}}]" aria-describedby="" value="{{old('hi_national_id.'.$key)? old('hi_national_id.'.$key) : '' }}" placeholder="xxxxxxxxxxx">
                                            
                                            <span class="help-block">
                                                <strong id="err-hi_national_id_{{$key}}">{{ $errors->first('hi_national_id.'.$key) }}</strong>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                        
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_relationship.'.$key) ? ' has-error' : '' }} grp-hi_relationship_{{$key}}">
                                            <label class="control-label mb-0" for="hi_relationship_{{$key}}">
                                                Relationship to Applicant <span class="red">*</span> 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide your national insurance number (passport) if applicable, for example "2000010".'></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="80%">
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
                                </tr>
                                
                                <tr>
                                    <td class="table-active text-right align-middle" width="20%">
                                        <div class="form-group mb-0{{ $errors->has('hi_emp_status.'.$key) ? ' has-error' : '' }} grp-hi_emp_status_{{$key}}">
                                            <label class="control-label mb-0" for="hi_emp_status_{{$key}}">
                                                Employment Status <span class="red">*</span> 
                                                <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide your national insurance number (passport) if applicable, for example "2000010".'></i>
                                            </label>
                                        </div>
                                    </td>
                                    <td width="80%">
                                        <div class="form-group{{ $errors->has('hi_emp_status.'.$key) ? ' has-error' : '' }} grp-hi_emp_status_{{$key}}" id="">
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
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    @endif
                @endforeach
            @endif

            <div id="additional_persons_div"></div>
            
            <div class="table-responsive household_row">
                <table class="table table-bordered table-sm">
                    <tfoot>
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <p class="text-right mb-0 {{$errors->has('hi_total_income')? 'text-primary' : ''}}">
                                    Total Household Income <span class="red">*</span> 
                                    <i class="fa fa-info-circle hide" aria-hidden="true" title='The income before is only required for the main applicant on behalf of the household even if more than one person may be impacted. Please state your income before retrenchment, termination or reduction of income.'></i>:
                                </p>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('hi_total_income') ? ' has-error' : '' }} grp-hi_total_income">
                                    <select class="form-control chosen-select" id="hi_total_income" name="hi_total_income">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($total_income as $income)
                                        <option {{old('hi_total_income') == $income->id? 'selected' : '' }} value="{{$income->id}}">{{$income->income}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_total_income">{{ $errors->first('hi_total_income') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr style="background-color: rgba(0,0,0,0.05);">
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
                        </tr> --}}
                    </tfoot>
                </table>
            </div>

            <div>
                <button class="btn btn-sm btn-success critical_add_household pull-right" type="button"><i class="fa fa-plus" aria-hidden="true"></i> add member</button>
            </div>
        </div>
    </div>
</section>