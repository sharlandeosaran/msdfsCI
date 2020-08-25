<h3><i class="fa fa-check" aria-hidden="true" title="Declaration of Truth"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section 5: Declaration of Truth</h5>

            <h4 class="mb-5">
                <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> A MATERIAL OR FALSE STATEMENT OR OMISSION MADE IN CONNECTION WITH THIS APPLICATION IS SUFFICIENT CAUSE FOR DENIAL OF THE SOCIAL SERVICES.</strong>
            </h4>
            
            <p class="text-justify">
                I <i><strong><span class="nameText">{{old('first_name')}} {{old('surname')}}</span></strong></i>, declare that all the statements in this form are true and correct to the best of my knowledge and belief, and I agree that any misrepresentations in this application will be grounds for denial of my application or request for repayment of any benefit received.
            </p>

            <div class="form-group pt-4 mb-0{{ $errors->has('declaration_signature') ? ' has-error' : '' }} grp-declaration_signature">
                  <input type="checkbox" class="declaration_signature" style="width: 25px; height: 25px;" id="declaration_signature" name="declaration_signature">
                  <label style="position: relative; top: -5px;" for="declaration_signature"><h3><strong>Signature: "I agree with the information stated above"</strong></h3></label>
                  <br>
                  <span class="help-block">
                    <strong id="err-declaration_signature">{{ $errors->first('declaration_signature') }}</strong>
                </span>
            </div>
        </div>
    </div>
    
</section>