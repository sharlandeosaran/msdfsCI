{{-- if files uploaded but form has errors --}}
@if (session('tempfiles'))
    <input type="hidden" name="tempfiles" value="{{session('tempfiles')}}">
@endif

<h3><i class="fa fa-upload" aria-hidden="true" title="Upload Documents"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4" id="div-uploads">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="uploadsSection"></span>: Upload Documents</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="form-group mb-0 mb-4">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your signature that matches your national identification card and uploaded.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }} mb-0 grp-signature">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="signature" name="signature" required value="{{old('signature')}}">
                                            <label class="custom-file-label uploadfail" for="signature" id="signatureLabel">{{old('signature_name')? old('signature_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('signature_name')}}" name="signature_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-signature">{{ $errors->first('signature') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="id_card_front_row" class="id_card_state proof_residence_row id_card_row {{(old('national_id_state') && old('national_id_state') != 'Have identification') && (old('proof_of_citizenship') && old('proof_of_citizenship') != 'National ID')? 'hide' : '' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_front') ? ' has-error' : '' }} mb-0 grp-id_card_front">
                                    <label class="control-label mb-0" for="id_card_front">
                                        National Identification Card <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='The front of the national identification card will have your picture. Take a copy of the front of your national identification card and upload.'></i>
                                        <br><strong>(Front)</strong>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('id_card_front') ? ' has-error' : '' }} mb-0 grp-id_card_front">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_front" name="id_card_front">
                                            <label class="custom-file-label uploadfail" for="id_card_front" id="id_card_frontLabel">{{old('id_card_front_name')? old('id_card_front_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('id_card_front_name')}}" name="id_card_front_name">
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
                                        National Identification Card <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='The back of the national identification card contains only words and has no picture. Take a copy of the back of your national identification card and upload.'></i>
                                        <br><strong>(Back)</strong>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('id_card_back') ? ' has-error' : '' }} mb-0 grp-id_card_back">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_back" name="id_card_back">
                                            <label class="custom-file-label uploadfail" for="id_card_back" id="id_card_backLabel">{{old('id_card_back_name')? old('id_card_back_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('id_card_back_name')}}" name="id_card_back_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-id_card_back">{{ $errors->first('id_card_back') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="employer_recommender_letter_div">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('employer_recommender_letter') ? ' has-error' : '' }} mb-0 grp-employer_recommender_letter">
                                    <label class="control-label mb-0" for="employer_recommender_letter">
                                        Proof of Retrenchment/ Termination/ Reduced Income <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a signed letter from your employer or a letter from recommender.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('employer_recommender_letter') ? ' has-error' : '' }} mb-0 grp-employer_recommender_letter">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="employer_recommender_letter" name="employer_recommender_letter" required>
                                            <label class="custom-file-label ulpoadlabel uploadfail" for="employer_recommender_letter" id="employer_recommender_letterLabel">{{old('employer_recommender_letter_name')? old('employer_recommender_letter_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('employer_recommender_letter_name')}}" name="employer_recommender_letter_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-employer_recommender_letter">{{ $errors->first('employer_recommender_letter') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr id="lost_id_police_report_row" class="id_card_state {{old('national_id_state') && old('national_id_state') == 'Lost but have police report'? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('lost_id_police_report') ? ' has-error' : '' }} mb-0 grp-lost_id_police_report">
                                    <label class="control-label mb-0" for="lost_id_police_report">
                                        Lost ID Police Report <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Copy the report slip given to you by the police station where you report your lost identification card.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('lost_id_police_report') ? ' has-error' : '' }} mb-0 grp-lost_id_police_report">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="lost_id_police_report" name="lost_id_police_report">
                                            <label class="custom-file-label uploadfail" for="lost_id_police_report" id="lost_id_police_reportLabel">{{old('lost_id_police_report_name')? old('lost_id_police_report_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('lost_id_police_report_name')}}" name="lost_id_police_report_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='The EBC letter would have been given to you to replace your national identification card to allow you to collect the new card. Copy the Elections and Boundaries Commission (EBC) letter with your identification number identified and upload.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('ebc_id_letter') ? ' has-error' : '' }} mb-0 grp-ebc_id_letter">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="ebc_id_letter" name="ebc_id_letter">
                                            <label class="custom-file-label uploadfail" for="ebc_id_letter" id="ebc_id_letterLabel">{{old('ebc_id_letter_name')? old('ebc_id_letter_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('ebc_id_letter_name')}}" name="ebc_id_letter_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach a copy of your certificate of immigration status with your approved national classification.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('cert_immigration_status') ? ' has-error' : '' }} mb-0 grp-cert_immigration_status">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="cert_immigration_status" name="cert_immigration_status">
                                            <label class="custom-file-label uploadfail" for="cert_immigration_status" id="cert_immigration_statusLabel">{{old('cert_immigration_status_name')? old('cert_immigration_status_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('cert_immigration_status_name')}}" name="cert_immigration_status_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach a copy of your certificate of residence issued by immigration with your approved national classification.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('cert_residence') ? ' has-error' : '' }} mb-0 grp-cert_residence">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="cert_residence" name="cert_residence">
                                            <label class="custom-file-label uploadfail" for="cert_residence" id="cert_residenceLabel">{{old('cert_residence_name')? old('cert_residence_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('cert_residence_name')}}" name="cert_residence_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach a copy of the identification page which states nationality on your passport.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('passport_bio') ? ' has-error' : '' }} mb-0 grp-passport_bio">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="passport_bio" name="passport_bio">
                                            <label class="custom-file-label uploadfail" for="passport_bio" id="passport_bioLabel">{{old('passport_bio_name')? old('passport_bio_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('passport_bio_name')}}" name="passport_bio_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='As a resident copy the stamp page the gives your length of stay and upload. As a citizen you can reattach identification page.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('passport_stamp') ? ' has-error' : '' }} mb-0 grp-passport_stamp">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="passport_stamp" name="passport_stamp">
                                            <label class="custom-file-label uploadfail" for="passport_stamp" id="passport_stampLabel">{{old('passport_stamp_name')? old('passport_stamp_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('passport_stamp_name')}}" name="passport_stamp_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-passport_stamp">{{ $errors->first('passport_stamp') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('landlord_id_card_front') ? ' has-error' : '' }} mb-0 grp-landlord_id_card_front">
                                    <label class="control-label mb-0" for="landlord_id_card_front">
                                        Landlord ID Card (front) <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide an identification for landlord like national identification card, passport or drivers permit.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('landlord_id_card_front') ? ' has-error' : '' }} mb-0 grp-landlord_id_card_front">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="landlord_id_card_front" name="landlord_id_card_front">
                                            <label class="custom-file-label uploadfail" for="landlord_id_card_front" id="landlord_id_card_frontLabel">{{old('landlord_id_card_front_name')? old('landlord_id_card_front_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('landlord_id_card_front_name')}}" name="landlord_id_card_front_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_id_card_front">{{ $errors->first('landlord_id_card_front') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('landlord_id_card_back') ? ' has-error' : '' }} mb-0 grp-landlord_id_card_back">
                                    <label class="control-label mb-0" for="landlord_id_card_back">
                                        Landlord ID Card (back) <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide an identification for landlord like national identification card, passport or drivers permit.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('landlord_id_card_back') ? ' has-error' : '' }} mb-0 grp-landlord_id_card_back">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="landlord_id_card_back" name="landlord_id_card_back">
                                            <label class="custom-file-label uploadfail" for="landlord_id_card_back" id="landlord_id_card_backLabel">{{old('landlord_id_card_back_name')? old('landlord_id_card_back_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('landlord_id_card_back_name')}}" name="landlord_id_card_back_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-landlord_id_card_back">{{ $errors->first('landlord_id_card_back') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('utility_bill') ? ' has-error' : '' }} mb-0 grp-utility_bill">
                                    <label class="control-label mb-0" for="utility_bill">
                                        Utility Bill <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach landlord proof of ownership like WASA Bill, any other document that proves they are the owner of the property.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('utility_bill') ? ' has-error' : '' }} mb-0 grp-utility_bill">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="utility_bill" name="utility_bill">
                                            <label class="custom-file-label uploadfail" for="utility_bill" id="utility_billLabel">{{old('utility_bill_name')? old('utility_bill_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('utility_bill_name')}}" name="utility_bill_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-utility_bill">{{ $errors->first('utility_bill') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields {{old('assistance_sought') && array_key_exists(2, old('assistance_sought'))? '' : 'hide' }}">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('rental_agreement') ? ' has-error' : '' }} mb-0 grp-rental_agreement">
                                    <label class="control-label mb-0" for="rental_agreement">
                                        Rental Agreement <span class="red">*</span> 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach the legal agreement signed with landlord.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('rental_agreement') ? ' has-error' : '' }} mb-0 grp-rental_agreement">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="rental_agreement" name="rental_agreement">
                                            <label class="custom-file-label uploadfail" for="rental_agreement" id="rental_agreementLabel">{{old('rental_agreement_name')? old('rental_agreement_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('rental_agreement_name')}}" name="rental_agreement_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach your most recent rent receipt.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('rent_receipt') ? ' has-error' : '' }} mb-0 grp-rent_receipt">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="rent_receipt" name="rent_receipt">
                                            <label class="custom-file-label uploadfail" for="rent_receipt" id="rent_receiptLabel">{{old('rental_agreement_name')? old('rental_agreement_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('rent_receipt_name')}}" name="rent_receipt_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Attach your certification establishing your business or company.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('cert_incorporation_registration') ? ' has-error' : '' }} mb-0 grp-cert_incorporation_registration">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="cert_incorporation_registration" name="cert_incorporation_registration">
                                            <label class="custom-file-label uploadfail" for="cert_incorporation_registration" id="cert_incorporation_registrationLabel">{{old('cert_incorporation_registration_name')? old('cert_incorporation_registration_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('cert_incorporation_registration_name')}}" name="cert_incorporation_registration_name">
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
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide a signed letter from your recommender.'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('recommendation_letter') ? ' has-error' : '' }} mb-0 grp-recommendation_letter">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="recommendation_letter" name="recommendation_letter">
                                            <label class="custom-file-label uploadfail" for="recommendation_letter" id="recommendation_letterLabel">{{old('recommendation_letter_name')? old('recommendation_letter_name') : 'Choose file'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('recommendation_letter_name')}}" name="recommendation_letter_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommendation_letter">{{ $errors->first('recommendation_letter') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="hide fire_div">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('fire_service_report') ? ' has-error' : '' }} mb-0 grp-fire_service_report">
                                    <label class="control-label mb-0" for="fire_service_report">
                                        Fire Service Report 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your fire_service_report that matches your national identification card and uploaded.'></i>
                                        <br>(multiple files allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('fire_service_report') ? ' has-error' : '' }} mb-0 grp-fire_service_report">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="fire_service_report" name="fire_service_report[]" value="{{old('fire_service_report')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="fire_service_report" id="fire_service_reportLabel">{{old('fire_service_report_name')? old('fire_service_report_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('fire_service_report_name')}}" name="fire_service_report_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-fire_service_report">{{ $errors->first('fire_service_report') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="hide water_marks_div">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('regional_corporation_flooding_report') ? ' has-error' : '' }} mb-0 grp-regional_corporation_flooding_report">
                                    <label class="control-label mb-0" for="regional_corporation_flooding_report">
                                        Regional Corporation Flooding Report 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your regional_corporation_flooding_report that matches your national identification card and uploaded.'></i>
                                        <br>(multiple files allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('regional_corporation_flooding_report') ? ' has-error' : '' }} mb-0 grp-regional_corporation_flooding_report">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="regional_corporation_flooding_report" name="regional_corporation_flooding_report[]" value="{{old('regional_corporation_flooding_report')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="regional_corporation_flooding_report" id="regional_corporation_flooding_reportLabel">{{old('regional_corporation_flooding_report_name')? old('regional_corporation_flooding_report_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('regional_corporation_flooding_report_name')}}" name="regional_corporation_flooding_report_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-regional_corporation_flooding_report">{{ $errors->first('regional_corporation_flooding_report') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="clothing_div items_lost_or_damaged_div hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('clothing_relief_quotation') ? ' has-error' : '' }} mb-0 grp-clothing_relief_quotation">
                                    <label class="control-label mb-0" for="clothing_relief_quotation">
                                        Clothing Relief Quotation 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your clothing_relief_quotation that matches your national identification card and uploaded.'></i>
                                        <br>(multiple files allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('clothing_relief_quotation') ? ' has-error' : '' }} mb-0 grp-clothing_relief_quotation">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="clothing_relief_quotation" name="clothing_relief_quotation[]" value="{{old('clothing_relief_quotation')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="clothing_relief_quotation" id="clothing_relief_quotationLabel">{{old('clothing_relief_quotation_name')? old('clothing_relief_quotation_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('clothing_relief_quotation_name')}}" name="clothing_relief_quotation_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-clothing_relief_quotation">{{ $errors->first('clothing_relief_quotation') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="critical_uploads hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('housing_relief_quotation') ? ' has-error' : '' }} mb-0 grp-housing_relief_quotation">
                                    <label class="control-label mb-0" for="housing_relief_quotation">
                                        Household Relief Quotation 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your housing_relief_quotation that matches your national identification card and uploaded.'></i>
                                        <br>(multiple files allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('housing_relief_quotation') ? ' has-error' : '' }} mb-0 grp-housing_relief_quotation">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="housing_relief_quotation" name="housing_relief_quotation[]" value="{{old('housing_relief_quotation')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="housing_relief_quotation" id="housing_relief_quotationLabel">{{old('housing_relief_quotation_name')? old('housing_relief_quotation_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('housing_relief_quotation_name')}}" name="housing_relief_quotation_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-housing_relief_quotation">{{ $errors->first('housing_relief_quotation') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="school_supplies_div school_supplies_primary_div school_supplies_secondary_div items_lost_or_damaged_div hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('school_supplies_relief_quotation') ? ' has-error' : '' }} mb-0 grp-school_supplies_relief_quotation">
                                    <label class="control-label mb-0" for="school_supplies_relief_quotation">
                                        School Supplies Relief Quotation 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your school_supplies_relief_quotation that matches your national identification card and uploaded.'></i>
                                        <br>(multiple files allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('school_supplies_relief_quotation') ? ' has-error' : '' }} mb-0 grp-school_supplies_relief_quotation">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="school_supplies_relief_quotation" name="school_supplies_relief_quotation[]" value="{{old('school_supplies_relief_quotation')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="school_supplies_relief_quotation" id="school_supplies_relief_quotationLabel">{{old('school_supplies_relief_quotation_name')? old('school_supplies_relief_quotation_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('school_supplies_relief_quotation_name')}}" name="school_supplies_relief_quotation_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-school_supplies_relief_quotation">{{ $errors->first('school_supplies_relief_quotation') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        

                        {{-- @if (old('hi_dob'))
                            @foreach (old('hi_dob') as $key => $item)
                                @if ($key != 1)

                                    <tr id="uploads_row_{{$key}}"> 
                                        <td class=" table-active text-right align-middle" width="20%"> 
                                            <div class="form-group{{ $errors->has('proof_of_earnings.'.$key) ? ' has-error' : '' }} mb-0 grp-proof_of_earnings_{{$key}}" id="grp-proof_of_earnings_{{$key}}"> 
                                                <label class="control-label mb-0" for="proof_of_earnings_{{$key}}"> 
                                                    Proof of Earnings for <span id="hi_name_{{$key}}_span">{{old('hi_first_name.'.$key) || old('hi_surname.'.$key)? old('hi_first_name.'.$key) .' '. old('hi_surname.'.$key) : '' }}</span> <i class="fa fa-info-circle" aria-hidden="true" title="Proof of actual earnings must be submitted such as a payslip or job letter for employed household members."></i> 
                                                </label> 
                                            </div> 
                                        </td> 
                                        <td width="80%"> 
                                            <div class="form-group{{ $errors->has('proof_of_earnings.'.$key) ? ' has-error' : '' }} mb-0 grp-proof_of_earnings_{{$key}}">
                                            <div class="input-group mb-0"> 
                                                <div class="custom-file"> 
                                                    <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_of_earnings_{{$key}}" name="proof_of_earnings[{{$key}}]"> 
                                                    <label class="custom-file-label" for="proof_of_earnings_{{$key}}" id="proof_of_earnings_{{$key}}Label">{{old('proof_of_earnings_name.'.$key)? old('proof_of_earnings_name.'.$key) : 'Choose file'}}</label> 
                                                </div> 
                                                <input type="hidden" class="uploadhelp" value="{{old('proof_of_earnings_name.'.$key)}}" name="proof_of_earnings_name[{{$key}}]">
                                            </div>
                                            </div>
                                            
                                            <span class="help-block"> 
                                                <strong id="err-proof_of_earnings_{{$key}}">{{ $errors->first('proof_of_earnings.'.$key) }}</strong> 
                                            </span> 
                                        </td> 
                                    </tr>

                                @endif
                            @endforeach
                        @endif --}}

                    </tbody>
                </table>
                
                <table class="table table-bordered table-sm">
                    <tbody>

                        <tr class="critical_uploads hide">
                            <td class="pt-4" colspan="2">
                                <h5><strong>Please Upload Images For The Following</strong></h5>

                                <div class="form-group mb-0 mb-4">
                                    <div class="required">
                                        <strong>** Accepted Image Types: png, jpg and jpeg **</strong><br>
                                        <strong>** Maximum Image Size: 10Mb **</strong>
                                    </div>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="hide water_marks_div">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('water_marks') ? ' has-error' : '' }} mb-0 grp-water_marks">
                                    <label class="control-label mb-0" for="water_marks">
                                        Water Marks on the Wall 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your water_marks that matches your national identification card and uploaded.'></i>
                                        <br>(multiple images allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('water_marks') ? ' has-error' : '' }} mb-0 grp-water_marks">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" id="water_marks" name="water_marks[]" value="{{old('water_marks')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="water_marks" id="water_marksLabel">{{old('water_marks_name')? old('water_marks_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('water_marks_name')}}" name="water_marks_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-water_marks">{{ $errors->first('water_marks') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="hide housing_repairs_div">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('structural_damage') ? ' has-error' : '' }} mb-0 grp-structural_damage">
                                    <label class="control-label mb-0" for="structural_damage">
                                        Structural Damage 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your structural_damage that matches your national identification card and uploaded.'></i>
                                        <br>(multiple images allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('structural_damage') ? ' has-error' : '' }} mb-0 grp-structural_damage">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" id="structural_damage" name="structural_damage[]" value="{{old('structural_damage')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="structural_damage" id="structural_damageLabel">{{old('structural_damage_name')? old('structural_damage_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('structural_damage_name')}}" name="structural_damage_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-structural_damage">{{ $errors->first('structural_damage') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="critical_uploads hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('electrical_damage') ? ' has-error' : '' }} mb-0 grp-electrical_damage">
                                    <label class="control-label mb-0" for="electrical_damage">
                                        Electrical Damage 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your electrical_damage that matches your national identification card and uploaded.'></i>
                                        <br>(multiple images allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('electrical_damage') ? ' has-error' : '' }} mb-0 grp-electrical_damage">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" id="electrical_damage" name="electrical_damage[]" value="{{old('electrical_damage')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="electrical_damage" id="electrical_damageLabel">{{old('electrical_damage_name')? old('electrical_damage_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('electrical_damage_name')}}" name="electrical_damage_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-electrical_damage">{{ $errors->first('electrical_damage') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>
                            
                        <tr class="critical_uploads hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('plumbing_damage') ? ' has-error' : '' }} mb-0 grp-plumbing_damage">
                                    <label class="control-label mb-0" for="plumbing_damage">
                                        Plumbing Damage 
                                        <i class="fa fa-info-circle hide" aria-hidden="true" title='Provide copy of your plumbing_damage that matches your national identification card and uploaded.'></i>
                                        <br>(multiple images allowed)
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('plumbing_damage') ? ' has-error' : '' }} mb-0 grp-plumbing_damage">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input" id="plumbing_damage" name="plumbing_damage[]" value="{{old('plumbing_damage')}}" multiple>
                                            <label class="custom-file-label uploadfail" for="plumbing_damage" id="plumbing_damageLabel">{{old('plumbing_damage_name')? old('plumbing_damage_name') : 'Choose files'}}</label>
                                        </div>
                                        <input type="hidden" class="uploadhelp" value="{{old('plumbing_damage_name')}}" name="plumbing_damage_name">
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-plumbing_damage">{{ $errors->first('plumbing_damage') }}</strong>
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