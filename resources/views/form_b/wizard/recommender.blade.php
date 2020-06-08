<h3><i class="fa fa-comment" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-recommender">
            
            <h5 class="bd-wizard-step-title mb-4">Section 3: Recommender Information</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_first_name') ? ' has-error' : '' }} grp-recommender_first_name">
                                    <label class="control-label mb-0" for="recommender_first_name">
                                        First Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the first name of the person that knowns you and can verify your business situation.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_first_name') ? ' has-error' : '' }} grp-recommender_first_name">
                                    <input type="text" class="form-control" id="recommender_first_name" name="recommender_first_name" aria-describedby="" value="{{old('recommender_first_name')? old('recommender_first_name') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_first_name">{{ $errors->first('recommender_first_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_surname') ? ' has-error' : '' }} grp-recommender_surname">
                                    <label class="control-label mb-0" for="recommender_surname">
                                        Surname <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the surname of the person that knowns you and can verify your business situation.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_surname') ? ' has-error' : '' }} grp-recommender_surname">
                                    <input type="text" class="form-control" id="recommender_surname" name="recommender_surname" aria-describedby="" value="{{old('recommender_surname')? old('recommender_surname') : '' }}" required maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_surname">{{ $errors->first('recommender_surname') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_gender') ? ' has-error' : '' }} grp-recommender_gender">
                                    <label class="control-label mb-0" for="recommender_gender">
                                        Gender <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the gender of the person you selected as a reference.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_gender') ? ' has-error' : '' }} grp-recommender_gender">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="recommender_male" name="recommender_gender" class="custom-control-input" value="M" required {{old('recommender_gender') == 'M'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="recommender_male">Male</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="recommender_female" name="recommender_gender" class="custom-control-input" value="F" {{old('recommender_gender') == 'F'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="recommender_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_gender">{{ $errors->first('recommender_gender') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_job_title') ? ' has-error' : '' }} grp-recommender_job_title">
                                    <label class="control-label mb-0" for="recommender_job_title">
                                        Job Title <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the most relevant job classification of the person you selected as a reference.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_job_title') ? ' has-error' : '' }} grp-recommender_job_title">
                                    <select class="form-control" id="recommender_job_title" name="recommender_job_title" required>
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($job_title as $key => $title)
                                        <option {{old('recommender_job_title') == $title['title']? 'selected' : '' }} num="{{$key}}">{{$title['title']}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_job_title">{{ $errors->first('recommender_job_title') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="recommender_job_title_info_row" class="{{in_array(old('recommender_job_title'), job_title_with_extra())? '' : 'hide'}}">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_job_title_info') ? ' has-error' : '' }} grp-recommender_job_title_info">
                                    <label class="control-label mb-0" for="recommender_job_title_info">
                                        <span id="recommender_job_title_label">Label</span> <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" id="recommender_job_title_help"></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_job_title_info') ? ' has-error' : '' }} grp-recommender_job_title_info">
                                    <input type="text" class="form-control" id="recommender_job_title_info" name="recommender_job_title_info" aria-describedby="" value="{{old('recommender_job_title_info')? old('recommender_job_title_info') : '' }}" maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_job_title_info">{{ $errors->first('recommender_job_title_info') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_contact_no') ? ' has-error' : '' }} grp-recommender_contact_no">
                                    <label class="control-label mb-0" for="recommender_contact_no">
                                        Contact Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the contact number of the person you selected as a reference.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_contact_no') ? ' has-error' : '' }} grp-recommender_contact_no">
                                    <input type="text" class="form-control" id="recommender_contact_no" name="recommender_contact_no" aria-describedby="" value="{{old('recommender_contact_no')? old('recommender_contact_no') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_contact_no">{{ $errors->first('recommender_contact_no') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_email') ? ' has-error' : '' }} grp-recommender_email">
                                    <label class="control-label mb-0" for="recommender_email">
                                        Email Address 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State an email address for person you selected as a reference.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_email') ? ' has-error' : '' }} grp-recommender_email">
                                    <input type="email" class="form-control" id="recommender_email" name="recommender_email" aria-describedby="" value="{{old('recommender_email')? old('recommender_email') : '' }}" placeholder="example@email.com" maxlength="250">
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_email">{{ $errors->first('recommender_email') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_home_address') ? ' has-error' : '' }} grp-recommender_home_address">
                                    <label class="control-label mb-0" for="recommender_home_address">
                                        Home Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the residential address for person you selected as a reference.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_home_address') ? ' has-error' : '' }} grp-recommender_home_address">
                                    <textarea class="form-control" id="recommender_home_address" name="recommender_home_address" rows="3" required maxlength="250">{{old('recommender_home_address')? old('recommender_home_address') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_home_address">{{ $errors->first('recommender_home_address') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_city_town') ? ' has-error' : '' }} grp-recommender_city_town">
                                    <label class="control-label mb-0" for="recommender_city_town">
                                        City/Town <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the city/town for the residential address provide for the person you selected as a reference.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_city_town') ? ' has-error' : '' }} grp-recommender_city_town">
                                    <select data-placeholder="Choose a City/Town..." class="form-control chosen-select" id="recommender_city_town" name="recommender_city_town">
                                        <option disabled="" selected="">select...</option>
                                        @foreach ($cities as $city)
                                        <option {{old('recommender_city_town') == $city? 'selected' : '' }}>{{$city}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_city_town">{{ $errors->first('recommender_city_town') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('recommender_years_known') ? ' has-error' : '' }} grp-recommender_years_known">
                                    <label class="control-label mb-0" for="recommender_years_known">
                                        Period Known <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State the number of years that the reference and applicant know one another.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('recommender_years_known') ? ' has-error' : '' }} grp-recommender_years_known">
                                    <div class="input-group">
                                        <input type="number" min="0" max="99" step="1" class="form-control" id="recommender_years_known" name="recommender_years_known" aria-describedby="" value="{{old('recommender_years_known')? old('recommender_years_known') : '' }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">years</span>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommender_years_known">{{ $errors->first('recommender_years_known') }}</strong>
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