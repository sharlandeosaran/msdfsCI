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
                        
                    </tbody>
                </table>
            </div>
            
            
            
        </div>
    </div>
</section>