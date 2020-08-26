<h3><i class="fa fa-user" aria-hidden="true" title="General Information"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-geninfo">
            
            <h5 class="bd-wizard-step-title">Section 1: General Information</h5>
            <h5 class=""><strong><i>TO BE COMPLETED BY ALL APPLICANTS</i></strong></h5>
            
            <div class="form-group mb-0 mb-2">
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
                                    <input type="text" class="form-control name first_name" id="first_name" name="first_name" aria-describedby="" value="{{old('first_name')? old('first_name') : '' }}" required maxlength="50">
                                    
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
                                    <input type="text" class="form-control name surname" id="surname" name="surname" aria-describedby="" value="{{old('surname')? old('surname') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-surname">{{ $errors->first('surname') }}</strong>
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
                                <div class="form-group mb-0{{ $errors->has('contact_no') ? ' has-error' : '' }} grp-contact_no">
                                    <label class="control-label mb-0" for="contact_no">
                                        Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('contact_no') ? ' has-error' : '' }} grp-contact_no">
                                    <input type="text" class="form-control phone" id="contact_no" name="contact_no" aria-describedby="" value="{{old('contact_no')? old('contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-contact_no">{{ $errors->first('contact_no') }}</strong>
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
                                        <option {{old('city_town') == $city->id? 'selected' : '' }} value="{{$city->id}}">{{$city->community}}</option>
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
                                <div class="form-group mb-0{{ $errors->has('proof_of_citizenship') ? ' has-error' : '' }} grp-proof_of_citizenship">
                                    <label class="control-label mb-0" for="proof_of_citizenship">
                                        Proof of Citizenship/ Permanent Residence <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select an additional proof of citizenship or residency that would future compliment your national classification.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('proof_of_citizenship') ? ' has-error' : '' }} grp-proof_of_citizenship">
                                    <select class="form-control" id="proof_of_citizenship" name="proof_of_citizenship">
                                        <option selected="" value="">select...</option>
                                        @foreach ($citizen_proof as $proof)
                                        <option {{old('proof_of_citizenship') == $proof->id? 'selected' : '' }} value="{{$proof->id}}">{{$proof->proof}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-proof_of_citizenship">{{ $errors->first('proof_of_citizenship') }}</strong>
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
                                            <option {{old('national_id_state') == $state->id? 'selected' : '' }} value="{{$state->id}}">{{$state->id_state}}</option>
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
                                <div class="form-group mb-0{{ $errors->has('nis') ? ' has-error' : '' }} grp-nis">
                                    <label class="control-label mb-0" for="nis">
                                        National Insurance Number 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide your national insurance number (NIS) if applicable, for example "2000010".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('nis') ? ' has-error' : '' }} grp-nis">
                                    <input type="text" maxlength="9" class="form-control" id="nis" name="nis" aria-describedby="" value="{{old('nis')? old('nis') : '' }}" placeholder="xxxxxxxxx">
                                    
                                    <span class="help-block">
                                        <strong id="err-nis">{{ $errors->first('nis') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('employment_classification') ? ' has-error' : '' }} grp-employment_classification">
                                    <label class="control-label mb-0" for="employment_classification">
                                        Employment Classification <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select an option that best represents your current situation for the month. Reduce income means that you have income coming in but is below the average. Loss of income means that no money form clients due to the CoVID-19 situation.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('employment_classification') ? ' has-error' : '' }} grp-employment_classification">
                                    <div>
                                        @if ($form == 'A')
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="retrenched" name="employment_classification" class="custom-control-input" value="retrenched" {{old('employment_classification') == 'retrenched'? 'checked' : '' }} required>
                                                    <label class="custom-control-label my-1" for="retrenched">Retrenched</label>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="terminated" name="employment_classification" class="custom-control-input" value="terminated" {{old('employment_classification') == 'terminated'? 'checked' : '' }}>
                                                    <label class="custom-control-label my-1" for="terminated">Terminated</label>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="income_reduced" name="employment_classification" class="custom-control-input" value="income_reduced" {{old('employment_classification') == 'income_reduced'? 'checked' : '' }}>
                                                    <label class="custom-control-label my-1" for="income_reduced">Income Reduced</label>
                                                </div>
                                            </div>
                                        @else
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="income_loss" name="employment_classification" class="custom-control-input" value="income_loss" {{old('employment_classification') == 'income_loss'? 'checked' : '' }}>
                                                    <label class="custom-control-label my-1" for="income_loss">Loss of Income</label>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="reduced_income" name="employment_classification" class="custom-control-input" value="reduced_income" {{old('employment_classification') == 'reduced_income'? 'checked' : '' }}>
                                                    <label class="custom-control-label my-1" for="reduced_income">Reduced Income</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-employment_classification">{{ $errors->first('employment_classification') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('effective_date') ? ' has-error' : '' }} grp-effective_date">
                                    <label class="control-label mb-0" for="effective_date">
                                        Effective Date <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the date when retrenched, termination or income was reduced. This should have occurred on or before 1st March 2020.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('effective_date') ? ' has-error' : '' }} grp-effective_date">
                                    <input type="text" class="form-control effectiveDate" id="effective_date" name="effective_date" aria-describedby="" value="{{old('effective_date')? old('effective_date') : '' }}" placeholder="yyyy-mm-dd" required>
                                    
                                    <span class="help-block">
                                        <strong id="err-effective_date">{{ $errors->first('effective_date') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('job_title') ? ' has-error' : '' }} grp-job_title">
                                    <label class="control-label mb-0" for="job_title">
                                        Job Title 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State you job position stated on business card, for example CEO, Owner, President.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('job_title') ? ' has-error' : '' }} grp-job_title">
                                    <input type="text" class="form-control" id="job_title" name="job_title" aria-describedby="" value="{{old('job_title')? old('job_title') : '' }}" maxlength="150">
                                    
                                    <span class="help-block">
                                        <strong id="err-job_title">{{ $errors->first('job_title') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('assistance_sought') ? ' has-error' : '' }} grp-assistance_sought">
                                    <label class="control-label mb-0" for="assistance_sought">
                                        Assistance Being Sought <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('assistance_sought') ? ' has-error' : '' }} grp-assistance_sought">
                                    <div class="col-md-12 checkbox-group required">
                                        @foreach ($assistance as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{$item->slug}}" name="assistance_sought[{{$item->id}}]" {{old('assistance_sought.'.$item->id) == 'on'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="{{$item->slug}}">{{$item->assistance}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-assistance_sought">{{ $errors->first('assistance_sought') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_first_name') ? ' has-error' : '' }} grp-landlord_first_name">
                                    <label class="control-label mb-0" for="landlord_first_name">
                                        Landlord First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the landlord first name as presented on identification that will be uploaded.'></i>
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
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_surname') ? ' has-error' : '' }} grp-landlord_surname">
                                    <label class="control-label mb-0" for="landlord_surname">
                                        Landlord Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the landlord surname as presented on identification that will be uploaded.'></i>
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
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('landlord_contact_no') ? ' has-error' : '' }} grp-landlord_contact_no">
                                    <label class="control-label mb-0" for="landlord_contact_no">
                                        Landlord Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone number to contact the landlord, for example "(868) 555-1234".'></i>
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
                        
                        <tr class="landlord-fields {{old('assistance_sought.2') == 'on'? '' : 'hide' }}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('rental_amount') ? ' has-error' : '' }} grp-rental_amount">
                                    <label class="control-label mb-0" for="rental_amount">
                                        Rental Amount <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the current rental amount in TT dollars that you are required to pay the landlord.'></i>
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
                                <div class="form-group mb-0{{ $errors->has('bank_name') ? ' has-error' : '' }} grp-bank_name">
                                    <label class="control-label mb-0" for="bank_name">
                                        Bank Name 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select your branch for payments to be sent. If no bank information is provided, then a check will be issued once you have qualified for the income support grant.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('bank_name') ? ' has-error' : '' }} grp-bank_name">
                                    <select class="form-control" id="bank_name" name="bank_name">
                                        <option selected="" value="">select...</option>
                                        @foreach ($banks as $bank)
                                        <option {{old('bank_name') == $bank->id? 'selected' : '' }} value="{{$bank->id}}">{{$bank->bank}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-bank_name">{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="{{old('bank_name') && old('bank_name') == 'Scotiabank'? '' : 'hide' }}" id="scotia_area_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('scotia_area') ? ' has-error' : '' }} grp-scotia_area">
                                    <label class="control-label mb-0" for="scotia_area">
                                        Branch Area <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide the location of your home branch.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('scotia_area') ? ' has-error' : '' }} grp-scotia_area">
                                    <select class="form-control" id="scotia_area" name="scotia_area">
                                        <option selected="" value="0">select...</option>
                                        @foreach ($scotia as $no => $branch)
                                        <option value="{{$no}}" {{old('scotia_area') == $no? 'selected' : '' }}>{{$branch->branch}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-scotia_area">{{ $errors->first('scotia_area') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="{{old('bank_name') && old('bank_name') == 'Scotiabank'? 'hide' : '' }}" id="bank_branch_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('bank_branch') ? ' has-error' : '' }} grp-bank_branch">
                                    <label class="control-label mb-0" for="bank_branch">
                                        Bank Branch 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide the location of your home branch.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('bank_branch') ? ' has-error' : '' }} grp-bank_branch">
                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch" aria-describedby="" value="{{old('bank_branch')? old('bank_branch') : '' }}" maxlength="25">
                                    
                                    <span class="help-block">
                                        <strong id="err-bank_branch">{{ $errors->first('bank_branch') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('bank_account') ? ' has-error' : '' }} grp-bank_account">
                                    <label class="control-label mb-0" for="bank_account">
                                        Account Number 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide your account number for the selected bank.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('bank_account') ? ' has-error' : '' }} grp-bank_account">
                                    <input type="text" class="form-control" id="bank_account" name="bank_account" aria-describedby="" value="{{old('bank_account')? old('bank_account') : '' }}" maxlength="15">
                                    
                                    <span class="help-block">
                                        <strong id="err-bank_account">{{ $errors->first('bank_account') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr></tr>
                    </tbody>
                </table>
            </div>
            
            
            
        </div>
    </div>
</section>