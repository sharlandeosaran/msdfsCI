<h3><i class="fa fa-check" aria-hidden="true"></i></h3>
<section>
    <div class="card border-primary shadow">
        <div class="card-body px-5">
            
            <h5 class="bd-wizard-step-title mb-4">Step 6: Submit</h5>
            {{-- <h4 class="mb-5"><strong>Review your Details and Submit</strong></h4> --}}
            
            <h4>By submitting this form I hereby declare that I am authorized to speak on behalf of <i><strong><span id="agree-name">{{old('name')}}</span></strong></i> and all the details provided by me in this form are true.</h4>

            @include('layouts.recaptcha')
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // recaptcha
        $("form").submit(function(event) {
            
            var recaptcha = $("#g-recaptcha-response").val();
            if (recaptcha === "") {
                event.preventDefault();
                alert("Please check the recaptcha");
                
                setTimeout(function(){ $(':submit').button('reset');}, 10);
            }
        });
    </script>
    
</section>