<h3><i class="fa fa-user" aria-hidden="true" title="General Information"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-geninfo">
            
            <h5 class="bd-wizard-step-title">Section 1: General Information</h5>
            <h5 class=""><strong><i>TO BE COMPLETED BY ALL APPLICANTS</i></strong></h5>
            
            <div class="form-group mb-4">
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
                                <div class="form-group mb-0{{ $errors->has('hi_first_name.1') ? ' has-error' : '' }} grp-first_name">
                                    <label class="control-label mb-0" for="first_name">
                                        First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your first name as indicated on your identification card.'></i>
                                        <br>(as appearing in ID)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_first_name.1') ? ' has-error' : '' }} grp-first_name">
                                    <input type="text" class="form-control name" id="first_name" name="hi_first_name[1]" aria-describedby="" value="{{old('hi_first_name.1')? old('hi_first_name.1') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-first_name">{{ $errors->first('hi_first_name.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_surname.1') ? ' has-error' : '' }} grp-surname">
                                    <label class="control-label mb-0" for="surname">
                                        Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your surname as indicated on your identification card.'></i>
                                        <br>(as appearing in ID)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_surname.1') ? ' has-error' : '' }} grp-surname">
                                    <input type="text" class="form-control name" id="surname" name="hi_surname[1]" aria-describedby="" value="{{old('hi_surname.1')? old('hi_surname.1') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-surname">{{ $errors->first('hi_surname.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('othername') ? ' has-error' : '' }} grp-othername">
                                    <label class="control-label mb-0" for="othername">
                                        Other Name(s) 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your othername as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('othername') ? ' has-error' : '' }} grp-othername">
                                    <input type="text" class="form-control name" id="othername" name="othername" aria-describedby="" value="{{old('othername')? old('othername') : '' }}" maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-othername">{{ $errors->first('othername') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('hi_gender.1') ? ' has-error' : '' }} grp-gender">
                                    <label class="control-label mb-0" for="gender">
                                        Gender <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select your gender.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_gender.1') ? ' has-error' : '' }} grp-gender">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="male" name="hi_gender[1]" class="custom-control-input hi_gender" value="M" required {{old('hi_gender.1') == 'M'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="male">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="female" name="hi_gender[1]" class="custom-control-input hi_gender" value="F" {{old('hi_gender.1') == 'F'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-gender">{{ $errors->first('hi_gender.1') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('email') ? ' has-error' : '' }} grp-email">
                                    <label class="control-label mb-0" for="email">
                                        Email 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide an email address for additional communication and to get your reference number for your application sent to you, for example "example@email.com".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('email') ? ' has-error' : '' }} grp-email">
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="" value="{{old('email')? old('email') : '' }}" placeholder="example@email.com" maxlength="250">
                                    
                                    <span class="help-block">
                                        <strong id="err-email">{{ $errors->first('email') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('marital_status') ? ' has-error' : '' }} grp-marital_status">
                                    <label class="control-label mb-0" for="marital_status">
                                        Marital Status 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the demographic data of your residential address.'></i>
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
                                <div class="form-group mb-0{{ $errors->has('hi_national_id.1') ? ' has-error' : '' }} grp-hi_national_id_1">
                                    <label class="control-label mb-0" for="hi_national_id_1">
                                        National Identification Card Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your national identification card number, for example "20000101001". Also select what proof you have for your national identification card. The document supplied must have the national identification number present.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('hi_national_id.1') ? ' has-error' : '' }} grp-hi_national_id_1">

                                    <div class="input-group">
                                        <input type="text" pattern="[0-9]{11}" maxlength="11" class="form-control" id="hi_national_id_1" name="hi_national_id[1]" aria-describedby="" value="{{old('hi_national_id.1')? old('hi_national_id.1') : '' }}" required placeholder="xxxxxxxxxxx">

                                        <select class="form-control" id="national_id_state" name="national_id_state">
                                            {{-- <option selected="" value="">select...</option> --}}
                                            @foreach ($id_state as $state)
                                            <option {{old('national_id_state') == $state->id? 'selected' : '' }} value="{{$state->id}}">{{$state->id_state}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-hi_national_id_1">{{ $errors->first('hi_national_id.1') }}</strong>
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
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_type') ? ' has-error' : '' }} grp-housing_type">
                                    <label class="control-label mb-0" for="housing_type">
                                        Type of Housing <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the demographic data of your residential address.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_type') ? ' has-error' : '' }} grp-housing_type">
                                    <select class="form-control chosen-select" id="housing_type" name="housing_type">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($housing_type as $row)
                                        <option {{old('housing_type') == $row->id? 'selected' : '' }} value="{{$row->id}}">{{$row->type}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-housing_type">{{ $errors->first('housing_type') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('housing_type') == '4'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_first_name') ? ' has-error' : '' }} grp-landlord_first_name">
                                    <label class="control-label mb-0" for="landlord_first_name">
                                        Landlord First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State the landlord first name as presented on identification that will be uploaded.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_first_name') ? ' has-error' : '' }} grp-landlord_first_name">
                                    <input type="text" class="form-control landlord" id="landlord_first_name" name="landlord_first_name" aria-describedby="" value="{{old('landlord_first_name')? old('landlord_first_name') : '' }}" maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_first_name">{{ $errors->first('landlord_first_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('housing_type') == '4'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_surname') ? ' has-error' : '' }} grp-landlord_surname">
                                    <label class="control-label mb-0" for="landlord_surname">
                                        Landlord Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State the landlord surname as presented on identification that will be uploaded.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_surname') ? ' has-error' : '' }} grp-landlord_surname">
                                    <input type="text" class="form-control landlord" id="landlord_surname" name="landlord_surname" aria-describedby="" value="{{old('landlord_surname')? old('landlord_surname') : '' }}" maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_surname">{{ $errors->first('landlord_surname') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('housing_type') == '4'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_contact_no') ? ' has-error' : '' }} grp-landlord_contact_no">
                                    <label class="control-label mb-0" for="landlord_contact_no">
                                        Landlord Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a phone number to contact the landlord, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('landlord_contact_no') ? ' has-error' : '' }} grp-landlord_contact_no">
                                    <input type="text" class="form-control landlord phone" id="landlord_contact_no" name="landlord_contact_no" aria-describedby="" value="{{old('landlord_contact_no')? old('landlord_contact_no') : '' }}" placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_contact_no">{{ $errors->first('landlord_contact_no') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('housing_type') == '4'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rental_amount') ? ' has-error' : '' }} grp-rental_amount">
                                    <label class="control-label mb-0" for="rental_amount">
                                        Rental Amount <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State the current rental amount in TT dollars that you are required to pay the landlord.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('rental_amount') ? ' has-error' : '' }} grp-rental_amount">
                                    <input type="number" min="0" step="0.01" class="form-control landlord" id="rental_amount" name="rental_amount" aria-describedby="" value="{{old('rental_amount')? old('rental_amount') : '' }}">
                                    
                                    <span class="help-block">
                                        <strong id="err-rental_amount">{{ $errors->first('rental_amount') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('home_address') ? ' has-error' : '' }} grp-home_address">
                                    <label class="control-label mb-0" for="home_address">
                                        Home Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your residential address with street name and area in Trinidad and Tobago.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('home_address') ? ' has-error' : '' }} grp-home_address">
                                    <textarea class="form-control" id="home_address" name="home_address" rows="3" required maxlength="250">{{old('home_address')? old('home_address') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-home_address">{{ $errors->first('home_address') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('region') ? ' has-error' : '' }} grp-region">
                                    <label class="control-label mb-0" for="region">
                                        Region <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the city/town for your residential address.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('region') ? ' has-error' : '' }} grp-region">
                                    <select class="form-control chosen-select" id="region" name="region">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($regions as $region)
                                        <option {{old('region') == $region->code? 'selected' : '' }} value="{{$region->code}}">{!! $region->region!!}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-region">{{ $errors->first('region') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('city_town') ? ' has-error' : '' }} grp-city_town">
                                    <label class="control-label mb-0" for="city_town">
                                        City/Town <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the city/town for your residential address.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('city_town') ? ' has-error' : '' }} grp-city_town">
                                    <select data-placeholder="Choose a City/Town..." class="form-control chosen-select" id="city_town" name="city_town">
                                        <option disabled="" selected="" value="0">select...</option>
                                        @foreach ($communities as $community)
                                        <option {{old('city_town') == $community->id? 'selected' : '' }} value="{{$community->id}}" class="hide communities region_{{$community->region_code}}">{!! $community->community !!}</option>
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
            
            
            
        </div>
    </div>
</section>