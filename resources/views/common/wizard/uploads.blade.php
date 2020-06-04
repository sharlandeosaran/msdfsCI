{{-- if files uploaded but form has errors --}}
@if (session('tempfiles'))
    <input type="" name="tempfiles" value="{{session('tempfiles')}}">
@endif

<h3><i class="fa fa-upload" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="uploadsSection"></span>: Upload Documents</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="form-group mb-0 mb-2">
                <div class="required">
                    <span class="red">*</span> Required Documents <br>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Help <br>
                    <strong>** Accepted File Types: pdf, doc, docx, png, jpg and jpeg **</strong><br>
                    <strong>** Maximum File Size: 10Mb **</strong>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody id="uploads_tbody">

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }} mb-0 grp-signature">
                                    <label class="control-label mb-0" for="signature">
                                        Signature <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }} mb-0 grp-signature">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="signature" name="signature" required value="{{old('signature')}}">
                                            <label class="custom-file-label" for="signature" id="signatureLabel">{{old('signature_name')? old('signature_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('signature_name')}}" name="signature_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-signature">{{ $errors->first('signature') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('employer_recommender_letter') ? ' has-error' : '' }} mb-0 grp-employer_recommender_letter">
                                    <label class="control-label mb-0" for="employer_recommender_letter">
                                        Proof of Retrenchment/ Termination/ Reduced Income <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('employer_recommender_letter') ? ' has-error' : '' }} mb-0 grp-employer_recommender_letter">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="employer_recommender_letter" name="employer_recommender_letter" required>
                                            <label class="custom-file-label" for="employer_recommender_letter" id="employer_recommender_letterLabel">{{old('employer_recommender_letter_name')? old('employer_recommender_letter_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('employer_recommender_letter_name')}}" name="employer_recommender_letter_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-employer_recommender_letter">{{ $errors->first('employer_recommender_letter') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="id_card_front_row" class="id_card_state proof_residence_row id_card_row {{(old('national_id_state') && old('national_id_state') != 'Have identification') && (old('proof_of_citizenship') && old('proof_of_citizenship') != 'National ID')? 'hide' : '' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_front') ? ' has-error' : '' }} mb-0 grp-id_card_front">
                                    <label class="control-label mb-0" for="id_card_front">
                                        National Identification Card - <strong>(Front)</strong> <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('id_card_front') ? ' has-error' : '' }} mb-0 grp-id_card_front">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_front" name="id_card_front">
                                            <label class="custom-file-label" for="id_card_front" id="id_card_frontLabel">{{old('id_card_front_name')? old('id_card_front_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('id_card_front_name')}}" name="id_card_front_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-id_card_front">{{ $errors->first('id_card_front') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="id_card_back_row" class="id_card_state proof_residence_row id_card_row {{(old('national_id_state') && old('national_id_state') != 'Have identification') && (old('proof_of_citizenship') && old('proof_of_citizenship') != 'National ID')? 'hide' : '' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_back') ? ' has-error' : '' }} mb-0 grp-id_card_back">
                                    <label class="control-label mb-0" for="id_card_back">
                                        National Identification Card - <strong>(Back)</strong> <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('id_card_back') ? ' has-error' : '' }} mb-0 grp-id_card_back">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_back" name="id_card_back">
                                            <label class="custom-file-label" for="id_card_back" id="id_card_backLabel">{{old('id_card_back_name')? old('id_card_back_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('id_card_back_name')}}" name="id_card_back_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-id_card_back">{{ $errors->first('id_card_back') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="lost_id_police_report_row" class="id_card_state {{old('national_id_state') && old('national_id_state') == 'Lost but have police report'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('lost_id_police_report') ? ' has-error' : '' }} mb-0 grp-lost_id_police_report">
                                    <label class="control-label mb-0" for="lost_id_police_report">
                                        Lost ID Police Report <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('lost_id_police_report') ? ' has-error' : '' }} mb-0 grp-lost_id_police_report">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="lost_id_police_report" name="lost_id_police_report">
                                            <label class="custom-file-label" for="lost_id_police_report" id="lost_id_police_reportLabel">{{old('lost_id_police_report_name')? old('lost_id_police_report_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('lost_id_police_report_name')}}" name="lost_id_police_report_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-lost_id_police_report">{{ $errors->first('lost_id_police_report') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="ebc_id_letter_row" class="id_card_state {{old('national_id_state') && old('national_id_state') == 'Have EBC letter'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('ebc_id_letter') ? ' has-error' : '' }} mb-0 grp-ebc_id_letter">
                                    <label class="control-label mb-0" for="ebc_id_letter">
                                        Letter From EBC Showing ID Number <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('ebc_id_letter') ? ' has-error' : '' }} mb-0 grp-ebc_id_letter">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="ebc_id_letter" name="ebc_id_letter">
                                            <label class="custom-file-label" for="ebc_id_letter" id="ebc_id_letterLabel">{{old('ebc_id_letter_name')? old('ebc_id_letter_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('ebc_id_letter_name')}}" name="ebc_id_letter_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-ebc_id_letter">{{ $errors->first('ebc_id_letter') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="proof_residence_row cert_immigration_status_row {{old('proof_of_citizenship') && old('proof_of_citizenship') == 'Certificate of Immigration Status'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('cert_immigration_status') ? ' has-error' : '' }} mb-0 grp-cert_immigration_status">
                                    <label class="control-label mb-0" for="cert_immigration_status">
                                        Certificate of Immigration Status <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('cert_immigration_status') ? ' has-error' : '' }} mb-0 grp-cert_immigration_status">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="cert_immigration_status" name="cert_immigration_status">
                                            <label class="custom-file-label" for="cert_immigration_status" id="cert_immigration_statusLabel">{{old('cert_immigration_status_name')? old('cert_immigration_status_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('cert_immigration_status_name')}}" name="cert_immigration_status_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-cert_immigration_status">{{ $errors->first('cert_immigration_status') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="proof_residence_row cert_residence_row {{old('proof_of_citizenship') && old('proof_of_citizenship') == 'Certificate of Residence'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('cert_residence') ? ' has-error' : '' }} mb-0 grp-cert_residence">
                                    <label class="control-label mb-0" for="cert_residence">
                                        Certificate of Residence <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('cert_residence') ? ' has-error' : '' }} mb-0 grp-cert_residence">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="cert_residence" name="cert_residence">
                                            <label class="custom-file-label" for="cert_residence" id="cert_residenceLabel">{{old('cert_residence_name')? old('cert_residence_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('cert_residence_name')}}" name="cert_residence_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-cert_residence">{{ $errors->first('cert_residence') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="passport_row proof_residence_row {{old('proof_of_citizenship') && old('proof_of_citizenship') == 'Passport'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('passport_bio') ? ' has-error' : '' }} mb-0 grp-passport_bio">
                                    <label class="control-label mb-0" for="passport_bio">
                                        Passport Bio-Data Page <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('passport_bio') ? ' has-error' : '' }} mb-0 grp-passport_bio">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="passport_bio" name="passport_bio">
                                            <label class="custom-file-label" for="passport_bio" id="passport_bioLabel">{{old('passport_bio_name')? old('passport_bio_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('passport_bio_name')}}" name="passport_bio_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-passport_bio">{{ $errors->first('passport_bio') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="passport_row proof_residence_row {{old('proof_of_citizenship') && old('proof_of_citizenship') == 'Passport'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('passport_stamp') ? ' has-error' : '' }} mb-0 grp-passport_stamp">
                                    <label class="control-label mb-0" for="passport_stamp">
                                        Passport Registration Stamp Page <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('passport_stamp') ? ' has-error' : '' }} mb-0 grp-passport_stamp">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="passport_stamp" name="passport_stamp">
                                            <label class="custom-file-label" for="passport_stamp" id="passport_stampLabel">{{old('passport_stamp_name')? old('passport_stamp_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('passport_stamp_name')}}" name="passport_stamp_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-passport_stamp">{{ $errors->first('passport_stamp') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_landlord_ownership') ? ' has-error' : '' }} mb-0 grp-proof_landlord_ownership">
                                    <label class="control-label mb-0" for="proof_landlord_ownership">
                                        Proof of Property Ownership <strong>(Landlord)</strong> <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('proof_landlord_ownership') ? ' has-error' : '' }} mb-0 grp-proof_landlord_ownership">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="proof_landlord_ownership" name="proof_landlord_ownership">
                                            <label class="custom-file-label" for="proof_landlord_ownership" id="proof_landlord_ownershipLabel">{{old('proof_landlord_ownership_name')? old('proof_landlord_ownership_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('proof_landlord_ownership_name')}}" name="proof_landlord_ownership_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-proof_landlord_ownership">{{ $errors->first('proof_landlord_ownership') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('landlord_id_card') ? ' has-error' : '' }} mb-0 grp-landlord_id_card">
                                    <label class="control-label mb-0" for="landlord_id_card">
                                        Landlord ID Card <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('landlord_id_card') ? ' has-error' : '' }} mb-0 grp-landlord_id_card">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="landlord_id_card" name="landlord_id_card">
                                            <label class="custom-file-label" for="landlord_id_card" id="landlord_id_cardLabel">{{old('landlord_id_card_name')? old('landlord_id_card_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('landlord_id_card_name')}}" name="landlord_id_card_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_id_card">{{ $errors->first('landlord_id_card') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('rental_agreement') ? ' has-error' : '' }} mb-0 grp-rental_agreement">
                                    <label class="control-label mb-0" for="rental_agreement">
                                        Rental Agreement <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('rental_agreement') ? ' has-error' : '' }} mb-0 grp-rental_agreement">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="rental_agreement" name="rental_agreement">
                                            <label class="custom-file-label" for="rental_agreement" id="rental_agreementLabel">{{old('rental_agreement_name')? old('rental_agreement_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('rental_agreement_name')}}" name="rental_agreement_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-rental_agreement">{{ $errors->first('rental_agreement') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('rent_receipt') ? ' has-error' : '' }} mb-0 grp-rent_receipt">
                                    <label class="control-label mb-0" for="rent_receipt">
                                        Recent Rent Receipt <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('rent_receipt') ? ' has-error' : '' }} mb-0 grp-rent_receipt">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="rent_receipt" name="rent_receipt">
                                            <label class="custom-file-label" for="rent_receipt" id="rent_receiptLabel">{{old('rental_agreement_name')? old('rental_agreement_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('c')}}" name="rent_receipt_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-rent_receipt">{{ $errors->first('rent_receipt') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr class="self-employed hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('cert_incorporation_registration') ? ' has-error' : '' }} mb-0" id="grp-cert_incorporation_registration">
                                    <label class="control-label mb-0" for="cert_incorporation_registration">
                                        Certificate of Registration/Incorporation 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('cert_incorporation_registration') ? ' has-error' : '' }} mb-0 grp-cert_incorporation_registration">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="cert_incorporation_registration" name="cert_incorporation_registration">
                                            <label class="custom-file-label" for="cert_incorporation_registration" id="cert_incorporation_registrationLabel">{{old('cert_incorporation_registration_name')? old('cert_incorporation_registration_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('cert_incorporation_registration_name')}}" name="cert_incorporation_registration_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-cert_incorporation_registration">{{ $errors->first('cert_incorporation_registration') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="self-employed hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('recommendation_letter') ? ' has-error' : '' }} mb-0 grp-recommendation_letter">
                                    <label class="control-label mb-0" for="recommendation_letter">
                                        Recommendation 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('recommendation_letter') ? ' has-error' : '' }} mb-0 grp-recommendation_letter">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="recommendation_letter" name="recommendation_letter">
                                            <label class="custom-file-label" for="recommendation_letter" id="recommendation_letterLabel">{{old('recommendation_letter_name')? old('recommendation_letter_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="" value="{{old('recommendation_letter_name')}}" name="recommendation_letter_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommendation_letter">{{ $errors->first('recommendation_letter') }}</strong>
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