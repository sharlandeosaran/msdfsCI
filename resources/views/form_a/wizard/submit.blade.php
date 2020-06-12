<h3><i class="fa fa-check" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-4">
            
            <h5 class="bd-wizard-step-title mb-4">Section 5: Declaration of Truth</h5>

            <h4 class="mb-5">
                <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> A MATERIAL OR FALSE STATEMENT OR OMISSION MADE IN CONNECTION WITH THIS APPLICATION IS SUFFICIENT CAUSE FOR DENIAL OF THE SOCIAL SERVICES.</strong>
            </h4>
            
            <p class="text-justify">
                I <i><strong><span class="nameText">{{old('first_name')}} {{old('surname')}}</span></strong></i>, swear that with effect <i><strong><span class="effectiveDateText">{{old('effective_date')}}</span></strong></i>. I was <i><strong><span class="employmentClassificationText">{{old('employment_classification')? employment_list()[old('employment_classification')] : ''}}</span></strong></i> while in the employ of <i><strong><span class="empNameText">{{old('emp_name')}}</span></strong></i>. I have read and understood all of the questions in this application and that all of the foregoing information and statements submitted in this application and its attachments and supporting documents are true and correct to the best of my knowledge, and that all responses to the questions are full and complete, omitting no material information. I recognise that the information submitted in this application is for the purpose of social services support by a government agency. I understand that a government agency may, by means it deems appropriate, determine the accuracy and truth of the statements in the application, and I authorise such agency to contact any certifying agencies for the purpose of verifying the information supplied and determining the named applicants’ eligibility. I agree to provide written notice to the recipient agency of any material change in the information contained in the original application within 30 calendar days of such change.
            </p>

            <p class="text-justify">
               I acknowledge and agree that any misrepresentations in this application will be grounds for denial or immediate revocation of benefits. I declare, under penalty of perjury, that the information provided in this application and supporting documents is true and correct.
            </p>

            <div class="form-group pt-4 mb-0">
                  <input type="checkbox" class="" style="width: 25px; height: 25px;" id="declaration_signature" name="declaration_signature">
                  <label style="position: relative; top: -5px;" for="declaration_signature"><h3><strong>Signature: "I agree with the information stated above"</strong></h3></label>
            </div>

            @include('layouts.recaptcha')
        </div>
    </div>
    
</section>