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
                                <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }} mb-0" id="grp-signature">
                                    <label class="control-label mb-0" for="signature">
                                        Signature <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="signature" name="signature" required>
                                        <label class="custom-file-label" for="signature" id="signatureLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-signature">{{ $errors->first('signature') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_front') ? ' has-error' : '' }} mb-0" id="grp-id_card_front">
                                    <label class="control-label mb-0" for="id_card_front">
                                        National Identification Card - <strong>(Front)</strong> <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_front" name="id_card_front" required>
                                        <label class="custom-file-label" for="id_card_front" id="id_card_frontLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-id_card_front">{{ $errors->first('id_card_front') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_back') ? ' has-error' : '' }} mb-0" id="grp-id_card_back">
                                    <label class="control-label mb-0" for="id_card_back">
                                        National Identification Card - <strong>(Back)</strong> <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="id_card_back" name="id_card_back" required>
                                        <label class="custom-file-label" for="id_card_back" id="id_card_backLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-id_card_back">{{ $errors->first('id_card_back') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_residence') ? ' has-error' : '' }} mb-0" id="grp-proof_residence">
                                    <label class="control-label mb-0" for="proof_residence">
                                        Proof of Citizenship/Permanent Residence &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_residence" name="proof_residence">
                                        <label class="custom-file-label" for="proof_residence" id="proof_residenceLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-proof_residence">{{ $errors->first('proof_residence') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_affected_income') ? ' has-error' : '' }} mb-0" id="grp-proof_affected_income">
                                    <label class="control-label mb-0" for="proof_affected_income">
                                        Proof of Retrenchment/ Termination/ Reduced Income <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_affected_income" name="proof_affected_income" required>
                                        <label class="custom-file-label" for="proof_affected_income" id="proof_affected_incomeLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-proof_affected_income">{{ $errors->first('proof_affected_income') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_ownership') ? ' has-error' : '' }} mb-0" id="grp-proof_ownership">
                                    <label class="control-label mb-0" for="proof_ownership">
                                        Proof of Property Ownership <strong>(Landlord)</strong> <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="proof_ownership" name="proof_ownership">
                                        <label class="custom-file-label" for="proof_ownership" id="proof_ownershipLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-proof_ownership">{{ $errors->first('proof_ownership') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_landlord') ? ' has-error' : '' }} mb-0" id="grp-id_card_landlord">
                                    <label class="control-label mb-0" for="id_card_landlord">
                                        National Identification Card - <strong>(Landlord)</strong> <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="id_card_landlord" name="id_card_landlord">
                                        <label class="custom-file-label" for="id_card_landlord" id="id_card_landlordLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-id_card_landlord">{{ $errors->first('id_card_landlord') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('rental_agreement') ? ' has-error' : '' }} mb-0" id="grp-rental_agreement">
                                    <label class="control-label mb-0" for="rental_agreement">
                                        Rental Agreement <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="rental_agreement" name="rental_agreement">
                                        <label class="custom-file-label" for="rental_agreement" id="rental_agreementLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-rental_agreement">{{ $errors->first('rental_agreement') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('rent_receipt') ? ' has-error' : '' }} mb-0" id="grp-rent_receipt">
                                    <label class="control-label mb-0" for="rent_receipt">
                                        Recent Rent Receipt <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="rent_receipt" name="rent_receipt">
                                        <label class="custom-file-label" for="rent_receipt" id="rent_receiptLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-rent_receipt">{{ $errors->first('rent_receipt') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="self-employed hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('incorporation_cert') ? ' has-error' : '' }} mb-0" id="grp-incorporation_cert">
                                    <label class="control-label mb-0" for="incorporation_cert">
                                        Certificate of Registration/Incorporation &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input landlord" id="incorporation_cert" name="incorporation_cert">
                                        <label class="custom-file-label" for="incorporation_cert" id="incorporation_certLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-incorporation_cert">{{ $errors->first('incorporation_cert') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="self-employed hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('recommendation_upload') ? ' has-error' : '' }} mb-0" id="grp-recommendation_upload">
                                    <label class="control-label mb-0" for="recommendation_upload">
                                        Recommendation <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="recommendation_upload" name="recommendation_upload" required>
                                        <label class="custom-file-label" for="recommendation_upload" id="recommendation_uploadLabel">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-recommendation_upload">{{ $errors->first('recommendation_upload') }}</strong>
                                </span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>