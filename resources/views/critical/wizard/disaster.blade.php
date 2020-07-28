<h3><i class="fa fa-home" aria-hidden="true" title="Disaster Information"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-disasterinfo">
            
            <h5 class="bd-wizard-step-title">Section 3: Disaster Information</h5>
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('disasters') ? ' has-error' : '' }} grp-disasters">
                                    <label class="control-label mb-0" for="disasters">
                                        Nature of Disaster <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('disasters') ? ' has-error' : '' }} grp-disasters">
                                    <div class="col-md-12 checkbox-group required">
                                        @foreach ($disasters as $key => $item)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input disasters" id="{{$key}}" name="disasters[{{$key}}]" {{old('disasters.'.$key) == 'on'? 'checked' : '' }}>
                                            <label class="custom-control-label my-1" for="{{$key}}">{{$item}}</label>
                                        </div>
                                        @if ($key == 'other_disaster')
                                            <div class="mb-2 hide disaster_remarks_div" id="disaster_remarks_{{$key}}">
                                            <input type="text" class="form-control" id="disaster_remarks_input_{{$key}}" aria-describedby="disaster_remarks_{{$key}}" name="disaster_remarks[{{$key}}]" value="{{old('disaster_remarks.'.$key)}}" placeholder="Brief remarks on disaster" maxlength="150">
                                        </div>
                                        @endif
                                        
                                        @endforeach
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-disasters">{{ $errors->first('disasters') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_damage') ? ' has-error' : '' }} grp-housing_damage">
                                    <label class="control-label mb-0" for="housing_damage">
                                        Have you suffered damages to Housing Infrastructure? <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_damage') ? ' has-error' : '' }} grp-housing_damage">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_damage" id="housing_damage1" value="yes" {{old('housing_damage') == 'yes'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="housing_damage1">Yes</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_damage" id="housing_damage2" value="no" {{old('housing_damage') == 'no'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="housing_damage2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-housing_damage">{{ $errors->first('housing_damage') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide housing_repairs_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_repairs') ? ' has-error' : '' }} grp-housing_repairs">
                                    <label class="control-label mb-0" for="housing_repairs">
                                        Brief  Description of Housing Repairs Required <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_repairs') ? ' has-error' : '' }} grp-housing_repairs">
                                    <textarea class="form-control" id="housing_repairs" name="housing_repairs" rows="3" required maxlength="250">{{old('housing_repairs')? old('housing_repairs') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-housing_repairs">{{ $errors->first('housing_repairs') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide housing_repairs_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_infrastructure_insured') ? ' has-error' : '' }} grp-housing_infrastructure_insured">
                                    <label class="control-label mb-0" for="housing_infrastructure_insured">
                                        Is the housing infrastructure insured? <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_infrastructure_insured') ? ' has-error' : '' }} grp-housing_infrastructure_insured">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_infrastructure_insured" id="housing_infrastructure_insured1" value="yes" {{old('housing_infrastructure_insured') == 'yes'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="housing_infrastructure_insured1">Yes</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_infrastructure_insured" id="housing_infrastructure_insured2" value="no" {{old('housing_infrastructure_insured') == 'no'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="housing_infrastructure_insured2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-housing_infrastructure_insured">{{ $errors->first('housing_infrastructure_insured') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('othername') ? ' has-error' : '' }} grp-othername">
                                    <label class="control-label mb-0" for="othername">
                                        Insurer Name <span class="red">*</span> 
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
                        
                        <tr class="hide housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('home_address') ? ' has-error' : '' }} grp-home_address">
                                    <label class="control-label mb-0" for="home_address">
                                        Insurer Address <span class="red">*</span> 
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
                        
                        <tr class="hide housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('primary_mobile_contact') ? ' has-error' : '' }} grp-primary_mobile_contact">
                                    <label class="control-label mb-0" for="primary_mobile_contact">
                                        Insurer Contact <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
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
                                <div class="form-group mb-0{{ $errors->has('items_lost_or_damaged') ? ' has-error' : '' }} grp-items_lost_or_damaged">
                                    <label class="control-label mb-0" for="items_lost_or_damaged">
                                        Items Lost or Damaged <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('items_lost_or_damaged') ? ' has-error' : '' }} grp-items_lost_or_damaged">
                                    <div class="col-md-12 checkbox-group required">
                                        @foreach ($items_lost_or_damaged as $key => $item)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input items_lost_or_damaged" id="{{$key}}" name="items_lost_or_damaged[{{$key}}]" {{old('items_lost_or_damaged.'.$key) == 'on'? 'checked' : '' }}>
                                            <label class="custom-control-label my-1" for="{{$key}}">{{$item}}</label>
                                        </div>
                                        <div class="mb-2 hide recovery_needs_div" id="recovery_needs_{{$key}}">
                                            <input type="text" class="form-control" id="recovery_needs_input_{{$key}}" aria-describedby="recovery_needs_{{$key}}" name="recovery_needs[{{$key}}]" value="{{old('recovery_needs.'.$key)}}" placeholder="Recovery needs for {{$item}}" maxlength="150">
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-items_lost_or_damaged">{{ $errors->first('items_lost_or_damaged') }}</strong>
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