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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('disaster') ? ' has-error' : '' }} grp-disaster">
                                    <select class="form-control other_remarks" id="disaster" name="disaster" required>
                                        <option disabled="" selected="">select...</option>
                                        @php $other = 'Other'; @endphp
                                        @foreach ($disasters as $disaster)
                                            @if ($disaster->id != '5')
                                                <option {{old('disaster') == $disaster->id? 'selected' : '' }} value="{{$disaster->id}}">{{$disaster->disaster}}</option>
                                            @else
                                                @php $other = $disaster->disaster; @endphp
                                            @endif
                                        @endforeach
    
                                        <option {{old('disaster') == '5'? 'selected' : '' }} value="5">{{$other}}</option>
                                    </select>

                                    <div class="mb-2 hide disaster_remarks_div" id="other_disaster_div">
                                        <input type="text" class="form-control" id="other_disaster" name="other_disaster" value="{{old('other_disaster')}}" placeholder="Specify other disaster" maxlength="150">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_damage') ? ' has-error' : '' }} grp-housing_damage">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_damage" id="housing_damage1" value="Y" {{old('housing_damage') == 'Y'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="housing_damage1">Yes</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_damage" id="housing_damage2" value="N" {{old('housing_damage') == 'N'? 'checked' : '' }}>
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
                        
                        <tr class="{{old('housing_damage') == 'Y'? '' : 'hide' }} housing_repairs_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_repairs') ? ' has-error' : '' }} grp-housing_repairs">
                                    <label class="control-label mb-0" for="housing_repairs">
                                        Brief  Description of Housing Damages <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the assistance desired.'></i>
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
                        
                        <tr class="{{old('housing_damage') == 'Y'? '' : 'hide' }} housing_repairs_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('housing_infrastructure_insured') ? ' has-error' : '' }} grp-housing_infrastructure_insured">
                                    <label class="control-label mb-0" for="housing_infrastructure_insured">
                                        Is the housing infrastructure insured? <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('housing_infrastructure_insured') ? ' has-error' : '' }} grp-housing_infrastructure_insured">
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_infrastructure_insured" id="housing_infrastructure_insured1" value="Y" {{old('housing_infrastructure_insured') == 'Y'? 'checked' : '' }}>
                                                <label class="custom-control-label my-1" for="housing_infrastructure_insured1">Yes</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="housing_infrastructure_insured" id="housing_infrastructure_insured2" value="N" {{old('housing_infrastructure_insured') == 'N'? 'checked' : '' }}>
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
                        
                        <tr class="{{old('housing_infrastructure_insured') == 'Y'? '' : 'hide' }} housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('insurer_name') ? ' has-error' : '' }} grp-insurer_name">
                                    <label class="control-label mb-0" for="insurer_name">
                                        Insurer Name <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your insurer_name as indicated on your identification card.'></i>
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
                        
                        <tr class="{{old('housing_infrastructure_insured') == 'Y'? '' : 'hide' }} housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('insurer_address') ? ' has-error' : '' }} grp-insurer_address">
                                    <label class="control-label mb-0" for="insurer_address">
                                        Insurer Address <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='State your residential address with street name and area in Trinidad and Tobago.'></i>
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
                        
                        <tr class="{{old('housing_infrastructure_insured') == 'Y'? '' : 'hide' }} housing_insurer_div">
                            <td class="table-active text-right align-middle" width="20%">
                                <div class="form-group mb-0{{ $errors->has('insurer_contact') ? ' has-error' : '' }} grp-insurer_contact">
                                    <label class="control-label mb-0" for="insurer_contact">
                                        Insurer Contact Information <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a phone contact number that you can be reached, for example "(868) 555-1234".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('insurer_contact') ? ' has-error' : '' }} grp-insurer_contact">
                                    <textarea class="form-control" id="insurer_contact" name="insurer_contact" rows="2" required maxlength="250">{{old('insurer_contact')? old('insurer_contact') : '' }}</textarea>
                                    
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Select the assistance desired.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group mb-0{{ $errors->has('items_lost_or_damaged') ? ' has-error' : '' }} grp-items_lost_or_damaged">
                                    <div class="col-md-12 checkbox-group required">
                                        @foreach ($items_lost_or_damaged as $item)
                                        <div class="custom-control custom-checkbox {{in_array($item->id, [10, 11])? 'hide items_lost_or_damaged_school_supplies' : ''}}" id="items_div_{{$item->slug}}">
                                            <input type="checkbox" class="custom-control-input items_lost_or_damaged" id="{{$item->slug}}" name="items_lost_or_damaged[{{$item->slug}}]" {{old('items_lost_or_damaged.'.$item->slug) == $item->id? 'checked' : '' }} value="{{$item->id}}">
                                            <label class="custom-control-label my-1" for="{{$item->slug}}">{{$item->item}}</label>
                                        </div>
                                        <div class="mb-2 hide recovery_needs_div" id="recovery_needs_{{$item->slug}}">
                                            <input type="text" class="form-control" id="recovery_needs_input_{{$item->slug}}" aria-describedby="recovery_needs_{{$item->slug}}" name="recovery_needs[{{$item->slug}}]" value="{{old('recovery_needs.'.$item->slug)}}" placeholder="Recovery needs for {{$item->item}}" maxlength="150">
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