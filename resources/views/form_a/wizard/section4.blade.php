<h3><i class="fa fa-upload" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section 4: Upload Documents</h5>
            {{-- <h2 class="section-heading">Enter your Account Details</h2> --}}
            
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td class=" table-active text-right align-middle" width="20%">
                                <div class="form-group{{ $errors->has('upload_name') ? ' has-error' : '' }} mb-0" id="grp-upload_name">
                                    <label class="control-label mb-0" for="upload_name">
                                        Document Name <span class="red">*</span> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-info-circle" aria-hidden="true"title='Please state your employer name, for example "Big Company".'></i>
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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>