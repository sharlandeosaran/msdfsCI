
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
    $('input[type="file"]'). change(function(e){
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
    $('a[href="#finish"]').click(function() {
        $('form').submit();
    });
       
    // Scotiabank help if selected
    $(document).on('change', '#bank_name', function() {
        var val = $(this).val();
        if (val == 'Scotiabank') {
            $('#scotia_help').removeClass('hide');
        } else {
            $('#scotia_help').addClass('hide');
        }
    })
    

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
    var householdCount = 2;
    $(document).on('click', '.add_household', function() {
        // add income row
        $('#household_tbody').append('<tr id="household_row_'+householdCount+'"><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm hi_name" id="hi_name_'+householdCount+'" name="hi_name['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="male">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="female">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm hi_income" id="hi_income_'+householdCount+'" name="hi_income['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td><button class="btn btn-sm btn-primary del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');

        // add uploads row
        $('#uploads_tbody').append('<tr id="uploads_row_'+householdCount+'"> <td class=" table-active text-right align-middle" width="20%"> <div class="form-group mb-0" id="grp-earnings_proof"> <label class="control-label mb-0" for="earnings_proof"> Proof of Earnings for <span id="hi_name_'+householdCount+'_span"></span> <span class="red">*</span> &nbsp;&nbsp;&nbsp; <i class="fa fa-info-circle" aria-hidden="true" title="Proof of actual earnings must be submitted such as a payslip or job letter for employed household members."></i> </label> </div> </td> <td width="80%"> <div class="input-group mb-0"> <div class="custom-file"> <input type="file" class="custom-file-input" id="earnings_proof" name="earnings_proof['+householdCount+']" required> <label class="custom-file-label" for="earnings_proof">Choose file</label> </div> </div><span class="help-block"> <strong id="err-earnings_proof"></strong> </span> </td> </tr>');

        // increment count
        householdCount++;
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

});