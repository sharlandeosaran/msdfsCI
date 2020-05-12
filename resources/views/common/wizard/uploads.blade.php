<h3><i class="fa fa-upload" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section <span id="uploadsSection"></span>: Upload Documents</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody id="uploads_tbody">
                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('id_card_front') ? ' has-error' : '' }} mb-0" id="grp-id_card_front">
                                    <label class="control-label mb-0" for="id_card_front">
                                        National Identification Card - Front <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="id_card_front" name="id_card_front" required>
                                        <label class="custom-file-label" for="id_card_front">Choose file</label>
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
                                        National Identification Card - Back <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="id_card_back" name="id_card_back" required>
                                        <label class="custom-file-label" for="id_card_back">Choose file</label>
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
                                        <input type="file" class="custom-file-input" id="proof_residence" name="proof_residence">
                                        <label class="custom-file-label" for="proof_residence">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-proof_residence">{{ $errors->first('proof_residence') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('upload_name') ? ' has-error' : '' }} mb-0" id="grp-upload_name">
                                    <label class="control-label mb-0" for="upload_name">
                                        Proof of Retrenchment/ Termination/ Reduced Income <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_name" name="upload_name" required>
                                        <label class="custom-file-label" for="upload_name">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-upload_name">{{ $errors->first('upload_name') }}</strong>
                                </span>
                            </td>
                        </tr>

                        <tr class="landlord-fields hide">
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('proof_ownership') ? ' has-error' : '' }} mb-0" id="grp-proof_ownership">
                                    <label class="control-label mb-0" for="proof_ownership">
                                        Proof of Property Ownership (Landlord) <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input landlord" id="proof_ownership" name="proof_ownership">
                                        <label class="custom-file-label" for="proof_ownership">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-proof_ownership">{{ $errors->first('proof_ownership') }}</strong>
                                </span>
                            </td>
                        </tr>
                        
                        



                        
                        {{-- <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('upload_name') ? ' has-error' : '' }} mb-0" id="grp-upload_name">
                                    <label class="control-label mb-0" for="upload_name">
                                        Document Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true" title='Please state your employer name, for example "Big Company".'></i>
                                    </label>
                                </div>
                            </td>
                            <td width="80%">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_name" name="upload_name">
                                        <label class="custom-file-label" for="upload_name">Choose file</label>
                                    </div>
                                </div>
                                
                                <span class="help-block">
                                    <strong id="err-upload_name">{{ $errors->first('upload_name') }}</strong>
                                </span>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>