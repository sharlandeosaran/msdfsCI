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
                                <div class="form-group mb-0{{ $errors->has('first_name') ? ' has-error' : '' }} grp-first_name">
                                    <label class="control-label mb-0" for="first_name">
                                        First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your first name as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('first_name') ? ' has-error' : '' }} grp-first_name">
                                    <input type="text" class="form-control name" id="first_name" name="first_name" aria-describedby="" value="{{old('first_name')? old('first_name') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-first_name">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('surname') ? ' has-error' : '' }} grp-surname">
                                    <label class="control-label mb-0" for="surname">
                                        Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your surname as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('surname') ? ' has-error' : '' }} grp-surname">
                                    <input type="text" class="form-control name" id="surname" name="surname" aria-describedby="" value="{{old('surname')? old('surname') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-surname">{{ $errors->first('surname') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('othername') ? ' has-error' : '' }} grp-othername">
                                    <label class="control-label mb-0" for="othername">
                                        Other Name(s) 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your othername as indicated on your identification card.'></i>
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
                                <div class="form-group mb-0{{ $errors->has('gender') ? ' has-error' : '' }} grp-gender">
                                    <label class="control-label mb-0" for="gender">
                                        Gender <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select your gender.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('gender') ? ' has-error' : '' }} grp-gender">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="male" name="gender" class="custom-control-input gender" value="M" required {{old('gender') == 'M'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="male">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="female" name="gender" class="custom-control-input gender" value="F" {{old('gender') == 'F'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-gender">{{ $errors->first('gender') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('national_id') ? ' has-error' : '' }} grp-national_id">
                                    <label class="control-label mb-0" for="national_id">
                                        National Identification Card Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your national identification card number, for example "20000101001". Also select what proof you have for your national identification card. The document supplied must have the national identification number present.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('national_id') ? ' has-error' : '' }} grp-national_id">

                                    <div class="input-group">
                                        <input type="text" pattern="[0-9]{11}" maxlength="11" class="form-control" id="national_id" name="national_id" aria-describedby="" value="{{old('national_id')? old('national_id') : '' }}" required placeholder="xxxxxxxxxxx">

                                        <select class="form-control" id="national_id_state" name="national_id_state">
                                            {{-- <option selected="" value="">select...</option> --}}
                                            @foreach ($id_state as $state)
                                            <option {{old('national_id_state') == $state? 'selected' : '' }}>{{$state}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-national_id">{{ $errors->first('national_id') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('drivers_permit') ? ' has-error' : '' }} grp-drivers_permit">
                                    <label class="control-label mb-0" for="drivers_permit">
                                        Driver's Permit 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide your national insurance number (drivers_permit) if applicable, for example "2000010".'></i>
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
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide your national insurance number (passport) if applicable, for example "2000010".'></i>
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
                                <div class="form-group mb-0{{ $errors->has('home_address') ? ' has-error' : '' }} grp-home_address">
                                    <label class="control-label mb-0" for="home_address">
                                        Home Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your residential address with street name and area in Trinidad and Tobago.'></i>
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
                                <div class="form-group mb-0{{ $errors->has('city_town') ? ' has-error' : '' }} grp-city_town">
                                    <label class="control-label mb-0" for="city_town">
                                        City/Town <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the city/town for your residential address.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('city_town') ? ' has-error' : '' }} grp-city_town">
                                    <select data-placeholder="Choose a City/Town..." class="form-control chosen-select" id="city_town" name="city_town">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($cities as $city)
                                        <option {{old('city_town') == $city? 'selected' : '' }}>{{$city}}</option>
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
                                <div class="form-group mb-0{{ $errors->has('contact_land_line') ? ' has-error' : '' }} grp-contact_land_line">
                                    <label class="control-label mb-0" for="contact_land_line">
                                        Contact - Land Line <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('contact_land_line') ? ' has-error' : '' }} grp-contact_land_line">
                                    <input type="text" class="form-control phone" id="contact_land_line" name="contact_land_line" aria-describedby="" value="{{old('contact_land_line')? old('contact_land_line') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-contact_land_line">{{ $errors->first('contact_land_line') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('contact_mobile') ? ' has-error' : '' }} grp-contact_mobile">
                                    <label class="control-label mb-0" for="contact_mobile">
                                        Contact - Mobile <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('contact_mobile') ? ' has-error' : '' }} grp-contact_mobile">
                                    <input type="text" class="form-control phone" id="contact_mobile" name="contact_mobile" aria-describedby="" value="{{old('contact_mobile')? old('contact_mobile') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-contact_mobile">{{ $errors->first('contact_mobile') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('contact_alternative') ? ' has-error' : '' }} grp-contact_alternative">
                                    <label class="control-label mb-0" for="contact_alternative">
                                        Contact - Alternative <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('contact_alternative') ? ' has-error' : '' }} grp-contact_alternative">
                                    <input type="text" class="form-control phone" id="contact_alternative" name="contact_alternative" aria-describedby="" value="{{old('contact_alternative')? old('contact_alternative') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-contact_alternative">{{ $errors->first('contact_alternative') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('email') ? ' has-error' : '' }} grp-email">
                                    <label class="control-label mb-0" for="email">
                                        Email Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide an email address for additional communication and to get your reference number for your application sent to you, for example "example@email.com".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('email') ? ' has-error' : '' }} grp-email">
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="" value="{{old('email')? old('email') : '' }}" required placeholder="example@email.com" maxlength="250">
                                    
                                    <span class="help-block">
                                        <strong id="err-email">{{ $errors->first('email') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('employment_classification') ? ' has-error' : '' }} grp-employment_classification">
                                    <label class="control-label mb-0" for="employment_classification">
                                        Employment Status <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Classification that best represents your current situation for the month.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('employment_classification') ? ' has-error' : '' }} grp-employment_classification">
                                    <input type="text" class="form-control" id="employment_classification" name="employment_classification" aria-describedby="" value="{{old('employment_classification')? old('employment_classification') : '' }}" required maxlength="150">
                                    
                                    <span class="help-block">
                                        <strong id="err-employment_classification">{{ $errors->first('employment_classification') }}</strong>
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