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
                                <div class="form-group mb-0{{ $errors->has('disaster') ? ' has-error' : '' }} grp-disaster">
                                    <label class="control-label mb-0" for="disaster">
                                        Nature of Disaster <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('disaster') ? ' has-error' : '' }} grp-disaster">
                                    <select class="form-control other_remarks" id="disaster" name="disaster" required>
                                        <option disabled="" selected="">select...</option>
                                        @php $other = 'Other'; @endphp
                                        @foreach ($disasters as $key => $disaster)
                                            @if ($key !== 'other_disaster')
                                                <option {{old('disaster') == $key? 'selected' : '' }} value="{{$key}}">{{$disaster}}</option>
                                            @else
                                                @php $other = $disaster; @endphp
                                            @endif
                                        @endforeach
    
                                        <option {{old('disaster') == 'other_disaster'? 'selected' : '' }} value="other_disaster">{{$other}}</option>
                                    </select>

                                    <div class="mb-2 hide disaster_remarks_div" id="other_disaster_remarks_div">
                                        <input type="text" class="form-control" id="other_disaster_remarks" name="other_disaster_remarks" value="{{old('other_disaster_remarks')}}" placeholder="Brief remarks on disaster" maxlength="150">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-disaster">{{ $errors->first('disaster') }}</strong>
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
                                <div class="form-group mb-0{{ $errors->has('insurer_name') ? ' has-error' : '' }} grp-insurer_name">
                                    <label class="control-label mb-0" for="insurer_name">
                                        Insurer Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your insurer_name as indicated on your identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('insurer_name') ? ' has-error' : '' }} grp-insurer_name">
                                    <input type="text" class="form-control name" id="insurer_name" name="insurer_name" aria-describedby="" value="{{old('insurer_name')? old('insurer_name') : '' }}" maxlength="50">
                                    
                                    <span class="help-block">
                                        <strong id="err-insurer_name">{{ $errors->first('insurer_name') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('insurer_address') ? ' has-error' : '' }} grp-insurer_address">
                                    <label class="control-label mb-0" for="insurer_address">
                                        Insurer Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='State your residential address with street name and area in Trinidad and Tobago.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('insurer_address') ? ' has-error' : '' }} grp-insurer_address">
                                    <textarea class="form-control" id="insurer_address" name="insurer_address" rows="3" required maxlength="250">{{old('insurer_address')? old('insurer_address') : '' }}</textarea>
                                    
                                    <span class="help-block">
                                        <strong id="err-insurer_address">{{ $errors->first('insurer_address') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="hide housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('insurer_contact') ? ' has-error' : '' }} grp-insurer_contact">
                                    <label class="control-label mb-0" for="insurer_contact">
                                        Insurer Contact <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('insurer_contact') ? ' has-error' : '' }} grp-insurer_contact">
                                    <input type="text" class="form-control phone" id="insurer_contact" name="insurer_contact" aria-describedby="" value="{{old('insurer_contact')? old('insurer_contact') : '' }}" required placeholder="(xxx) xxx-xxxx" maxlength="17">
                                    
                                    <span class="help-block">
                                        <strong id="err-insurer_contact">{{ $errors->first('insurer_contact') }}</strong>
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