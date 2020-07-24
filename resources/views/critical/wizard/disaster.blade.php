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
                                        <div class="mb-2 hide disaster_remarks_div" id="disaster_remarks_{{$key}}">
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="disaster_remarks_{{$key}}" name="disaster_remarks[{{$key}}]" value="{{old('disaster_remarks.'.$key)}}" placeholder="Brief remarks on {{$item}}">
                                        </div>
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
                                <div class="form-group mb-0{{ $errors->has('household_damage_items') ? ' has-error' : '' }} grp-household_damage_items">
                                    <label class="control-label mb-0" for="household_damage_items">
                                        Household Damage <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('household_damage_items') ? ' has-error' : '' }} grp-household_damage_items">
                                    <div class="col-md-12 checkbox-group required">
                                        @foreach ($household_damage_items as $key => $item)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input household_damage_items" id="{{$key}}" name="household_damage_items[{{$key}}]" {{old('household_damage_items.'.$key) == 'on'? 'checked' : '' }}>
                                            <label class="custom-control-label my-1" for="{{$key}}">{{$item}}</label>
                                        </div>
                                        <div class="mb-2 hide recovery_needs_div" id="recovery_needs_{{$key}}">
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="recovery_needs_{{$key}}" name="recovery_needs[{{$key}}]" value="{{old('recovery_needs.'.$key)}}" placeholder="Recovery needs for {{$item}}">
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-household_damage_items">{{ $errors->first('household_damage_items') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_damage') ? ' has-error' : '' }} grp-housing_damage">
                                    <label class="control-label mb-0" for="housing_damage">
                                        Housing Damage <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_damage') ? ' has-error' : '' }} grp-housing_damage">
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" name="housing_damage" id="housing_damage1" value="yes" {{old('housing_damage') == 'yes'? 'checked' : '' }}>
                                        <label class="form-check-label" for="housing_damage1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" name="housing_damage" id="housing_damage2" value="no" {{old('housing_damage') == 'no'? 'checked' : '' }}>
                                        <label class="form-check-label" for="housing_damage2">
                                            No
                                        </label>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-housing_damage">{{ $errors->first('housing_damage') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide" id="housing_repairs_div">
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
                        
                        <tr></tr>
                    </tbody>
                </table>
            </div>
            
            
            
        </div>
    </div>
</section>