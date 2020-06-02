{{-- if files uploaded but form has errors --}}
@if (session('folder'))
    <input type="hidden" name="folder" value="{{session('folder')}}">
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
                                            <label class="custom-file-label" for="signature" id="signatureLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-signature">{{ $errors->first('signature') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr>
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
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_front" name="id_card_front" required>
                                            <label class="custom-file-label" for="id_card_front" id="id_card_frontLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-id_card_front">{{ $errors->first('id_card_front') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr>
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
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_back" name="id_card_back" required>
                                            <label class="custom-file-label" for="id_card_back" id="id_card_backLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-id_card_back">{{ $errors->first('id_card_back') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="proof_residence_row cert_immigration_status_row {{old('citizen_proof') && old('citizen_proof') == 'Certificate of Immigration Status'? '' : 'hide' }}">
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
                                            <label class="custom-file-label" for="cert_immigration_status" id="cert_immigration_statusLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-cert_immigration_status">{{ $errors->first('cert_immigration_status') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="proof_residence_row cert_residence_row {{old('citizen_proof') && old('citizen_proof') == 'Certificate of Residence'? '' : 'hide' }}">
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
                                            <label class="custom-file-label" for="cert_residence" id="cert_residenceLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-cert_residence">{{ $errors->first('cert_residence') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="passport_row proof_residence_row {{old('citizen_proof') && old('citizen_proof') == 'Passport'? '' : 'hide' }}">
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
                                            <label class="custom-file-label" for="passport_bio" id="passport_bioLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-passport_bio">{{ $errors->first('passport_bio') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="passport_row proof_residence_row {{old('citizen_proof') && old('citizen_proof') == 'Passport'? '' : 'hide' }}">
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
                                            <label class="custom-file-label" for="passport_stamp" id="passport_stampLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-passport_stamp">{{ $errors->first('passport_stamp') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_affected_income') ? ' has-error' : '' }} mb-0 grp-proof_affected_income">
                                    <label class="control-label mb-0" for="proof_affected_income">
                                        Proof of Retrenchment/ Termination/ Reduced Income <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('proof_affected_income') ? ' has-error' : '' }} mb-0 grp-proof_affected_income">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_affected_income" name="proof_affected_income" required>
                                            <label class="custom-file-label" for="proof_affected_income" id="proof_affected_incomeLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-proof_affected_income">{{ $errors->first('proof_affected_income') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_ownership') ? ' has-error' : '' }} mb-0 grp-proof_ownership">
                                    <label class="control-label mb-0" for="proof_ownership">
                                        Proof of Property Ownership <strong>(Landlord)</strong> <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('proof_ownership') ? ' has-error' : '' }} mb-0 grp-proof_ownership">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="proof_ownership" name="proof_ownership">
                                            <label class="custom-file-label" for="proof_ownership" id="proof_ownershipLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-proof_ownership">{{ $errors->first('proof_ownership') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_landlord') ? ' has-error' : '' }} mb-0 grp-id_card_landlord">
                                    <label class="control-label mb-0" for="id_card_landlord">
                                        National Identification Card - <strong>(Landlord)</strong> <span class="red">*</span> 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('id_card_landlord') ? ' has-error' : '' }} mb-0 grp-id_card_landlord">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="id_card_landlord" name="id_card_landlord">
                                            <label class="custom-file-label" for="id_card_landlord" id="id_card_landlordLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-id_card_landlord">{{ $errors->first('id_card_landlord') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
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
                                            <label class="custom-file-label" for="rental_agreement" id="rental_agreementLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-rental_agreement">{{ $errors->first('rental_agreement') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
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
                                            <label class="custom-file-label" for="rent_receipt" id="rent_receiptLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-rent_receipt">{{ $errors->first('rent_receipt') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="self-employed hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('incorporation_cert') ? ' has-error' : '' }} mb-0" id="grp-incorporation_cert">
                                    <label class="control-label mb-0" for="incorporation_cert">
                                        Certificate of Registration/Incorporation 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('incorporation_cert') ? ' has-error' : '' }} mb-0 grp-incorporation_cert">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="incorporation_cert" name="incorporation_cert">
                                            <label class="custom-file-label" for="incorporation_cert" id="incorporation_certLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-incorporation_cert">{{ $errors->first('incorporation_cert') }}</strong>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr class="self-employed hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('recommendation_upload') ? ' has-error' : '' }} mb-0 grp-recommendation_upload">
                                    <label class="control-label mb-0" for="recommendation_upload">
                                        Recommendation 
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="form-group{{ $errors->has('recommendation_upload') ? ' has-error' : '' }} mb-0 grp-recommendation_upload">
                                    <div class="input-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="recommendation_upload" name="recommendation_upload">
                                            <label class="custom-file-label" for="recommendation_upload" id="recommendation_uploadLabel">Choose file</label>
                                        </div>
                                    </div>
                                    
                                    <span class="help-block">
                                        <strong id="err-recommendation_upload">{{ $errors->first('recommendation_upload') }}</strong>
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