
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
        $('#'+fileName+'-review').val('None');
        if ($(this).val() !== '') {
            var upload = e. target. files[0]. name;
            var size = e. target. files[0].size;
            // console.log(size);

            // check file is less than 10 Mb
            if (size > 10485760) {
                alert('Maximum file size is 10Mb. \nFile not uploaded.');
                $(this).val('');
            } else {
                $('#'+fileName+'-review').val(upload);
                $('#'+fileName+'Label').html(upload);
            }
            
        }
    });

    // submit form
    $('a[href="#finish"]').click(function() {
        $('form').submit();
    });

    /** Section - Household Information **/

    // add household income row
    var householdCount = 2;
    $(document).on('click', '.add_household', function() {
        $('#household_tbody').append('<tr id="household_row_'+householdCount+'"><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_name_'+householdCount+'" name="hi_name['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="male">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="female">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm hi_income" id="hi_income_'+householdCount+'" name="hi_income['+householdCount+']" aria-describedby="" required><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td><button class="btn btn-sm btn-primary del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');
        householdCount++;
    });

    // delete household income row
    $(document).on('click', '.del_household', function() {
        var num = $(this).attr('num');
        $('#household_row_'+num).remove();
        hiTotal();
    });

    // sum total income
    $(document).on('change', '.hi_income', function() {
        hiTotal();
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

    
    // $("input.phone").mask("(999) 999-9999");
});