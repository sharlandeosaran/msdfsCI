
$(function () {
    
    // initialize wizard
    $("#wizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "none",
        stepsOrientation: "horizontal",
        titleTemplate: '<span class="number">#title#</span>'
    });

    // load recaptcha at end of wizard
    $(document).on('click', '[href="#next"], li.last', function() {
        if ($('li.last').hasClass('current')) {
            $.getScript( "https://www.google.com/recaptcha/api.js" )
            .done(function( script, textStatus ) {
                $('#recaptcha').addClass('captcha');
                // console.log( textStatus );
            })
            .fail(function( jqxhr, settings, exception ) {
                alert( "Recaptcha did not load. Please try refreshing your page and submitting again." );
            });

            if ($('#recaptcha').hasClass('captcha')) {
                setTimeout(function(){ 
                    grecaptcha.reset();
                }, 100);
                // console.log('reset')
            }
        }
    });
    
    // show name of uploaded file
    $(document).on('change', 'input[type="file"]', function(e) {
        var fileName = $(this).prop('id');
        $('#'+fileName+'Label').html('Choose file');
        // $('#'+fileName+'-review').val('None');
        if ($(this).val() !== '') {
            var upload = e. target. files[0]. name;
            var size = e. target. files[0].size;
            // console.log(size);

            // check file is less than 10 Mb
            if (size > 10485760) {
                alert('Maximum file size is 10Mb. \nFile not uploaded.');
                $(this).val('');
            } else {
                // $('#'+fileName+'-review').val(upload);
                $('#'+fileName+'Label').html(upload);
            }
            
        }
    });

    // submit form
       
    // Scotiabank help if selected
    $(document).on('change', '#bank_name', function() {
        var val = $(this).val();
        if (val == 'Scotiabank') {
            $('#scotia_area_div').removeClass('hide');
            $('#bank_branch_div').addClass('hide');
        } else {
            $('#scotia_area_div').addClass('hide');
            $('#bank_branch_div').removeClass('hide');
            $('#scotia_area').val(0);
        }
    });

    // db datepicker
    function dob() {
        $('.dob').datepicker({
            format: "yyyy-mm-dd",
            endDate: "now()",
            startView: 3,
            autoclose: true
        });
    }
    dob();

    // effective date datepicker
    $('#effective_date').datepicker({
        format: "yyyy-mm-dd",
        endDate: "now()",
        startView: 1,
        autoclose: true
    });
    
    // clear error messgaes
    $(document).on('change', '.form-control, .custom-control-input, .custom-file-input', function() {
        var field = $(this).prop('name');
        var id = $(this).prop('id');
        var gender = $(this).attr('gender');
        $('.grp-'+field).removeClass('has-error');
        $('#err-'+field).html('');
        $('.grp-'+id).removeClass('has-error');
        $('#err-'+id).html('');
        $('.grp-'+gender).removeClass('has-error');
        $('#err-'+gender).html('');
    });

    /** Section - General Information **/

    // if rental assistance selected get landlord info
    $(document).on('click', '#rental_assistance', function() {
        var checked = $(this).prop("checked");
        if (checked) {
            $('.landlord-fields').removeClass('hide');
            $('.landlord').prop('required', true);
        } else {
            $('.landlord-fields').addClass('hide');
            $('.landlord').prop('required', false);
        }
    });

    /** General Information End **/
    

    /** Section - Household Information **/

    // add household income rows
    $(document).on('click', '.add_household', function() {
        var rows = $('.household_row').length;
        if (rows < 10) {
                
            // add income row
            $('#household_tbody').append('<tr class="household_row" id="household_row_'+householdCount+'"><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm hi_name" id="hi_name_'+householdCount+'" name="hi_name['+householdCount+']" aria-describedby="" required maxlength="100"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="M">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="F">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']" aria-describedby="" required maxlength="25"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm dob" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required placeholder="yyyy-mm-dd"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']" aria-describedby="" required maxlength="25"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm hi_income" id="hi_income_'+householdCount+'" name="hi_income['+householdCount+']" aria-describedby="" required value="0"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td><button class="btn btn-sm btn-primary del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');

            // add uploads row
            $('#uploads_tbody').append('<tr id="uploads_row_'+householdCount+'"> <td class=" table-active text-right align-middle" width="20%"> <div class="form-group mb-0" id="grp-proof_of_earnings_'+householdCount+'"> <label class="control-label mb-0" for="proof_of_earnings_'+householdCount+'"> Proof of Earnings for <span id="hi_name_'+householdCount+'_span"></span> <i class="fa fa-info-circle" aria-hidden="true" title="Proof of actual earnings must be submitted such as a payslip or job letter for employed household members."></i> </label> </div> </td> <td width="80%"> <div class="input-group mb-0"> <div class="custom-file"> <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_of_earnings_'+householdCount+'" name="proof_of_earnings['+householdCount+']" required> <label class="custom-file-label" for="proof_of_earnings_'+householdCount+'" id="proof_of_earnings_'+householdCount+'Label">Choose file</label> </div> </div><span class="help-block"> <strong id="err-proof_of_earnings_'+householdCount+'"></strong> </span> </td> </tr>');

            // increment count
            householdCount++;
            
            dob();
        }

    });

    // delete household income row
    $(document).on('click', '.del_household', function() {
        var num = $(this).attr('num');
        $('#household_row_'+num).remove();
        $('#uploads_row_'+num).remove();
        hiTotal();
    });

    // sum total income
    $(document).on('change', '.hi_income', function() {
        hiTotal();
    });

    // change name of household person in uploads
    $(document).on('change', '.hi_name', function() {
        var id = $(this).prop('id');
        var name = $(this).val();
        $('#'+id+'_span').html(name);
    });

    // calculate total income
    function hiTotal() {
        var total = 0;
        $('.hi_income').each(function(i, e){
            if(e.value > 0) total += parseFloat(e.value);
        });
        $('#hi_total_income').val(total.toFixed(2));
    }

    /** Household Information End **/


    // check that at least one assistance is checked
    /* if ($('div.checkbox-group.required :checkbox:checked').length > 0) {
        
    } else {
        
    } */

    // change name after name entered
    $(document).on('change', '.name', function(){
        var name = $('#first_name').val() + ' ' + $('#surname').val();
        $('.nameField').val(name);
        $('.nameText').html(name);
    });

    // change date after entered
    $(document).on('change', '.effectiveDate', function(){
        var date = $('#effective_date').val();
        $('.effectiveDateField').val(date);
        $('.effectiveDateText').html(date);
    });

    // change gender of applicant after entered
    $(document).on('change', '.gender', function(){
        var gender = $('[name="gender"]:checked').val();
        $('.hi_gender_'+ gender).prop('checked', true);
    });

});