
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
    /* $(document).on('click', '[href="#next"], li.last', function() {
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
    }); */

    // show name of uploaded file
    $(document).on('change click', 'input[type="file"]', function(e) {
        var fileName = $(this).prop('id');
        var multiple = $(this).prop('multiple');
        var files = e. target. files. length;
        // console.log(e. target. files)
    
        if (multiple) {
            $('#'+fileName+'Label').html('Choose files');
            $('[name="'+fileName+'_name"]').val('');
            // console.log(files)
    
            if (files) {
                $(this).each(function(index, field){
                    var chk = true;
                    var upload = files == 1? files + ' File chosen' : files + ' Files chosen';
    
                    for(var i=0;i<field.files.length;i++) {
                        const file = field.files[i];
                        if(file.size > 10485760 || file.fileSize > 10485760) {
                            chk = false;
                        }
                    }
                    // console.log(upload)
    
                    if (chk) {
                        $('#'+fileName+'Label').html(upload);
                        $('[name="'+fileName+'_name"]').val(upload);
                    } else {
                        alert('Maximum file size is 10Mb. \nFiles not uploaded.');
                        $(this).val('');
                    }
                });
            }
            
        } else {
            $('#'+fileName+'Label').html('Choose file');
            $('[name="'+fileName+'_name"]').val('');
            // console.log('file')
            
            if ($(this).val() !== '') {
                var upload = e. target. files[0]. name;
                var size = e. target. files[0].size;
                
                // check file is less than 10 Mb
                if (size > 10485760) {
                    alert('Maximum file size is 10Mb. \nFile not uploaded.');
                    $(this).val('');
                } else {
                    $('#'+fileName+'Label').html(upload);
                    $('[name="'+fileName+'_name"]').val(upload);
                }
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

    // effective date datepicker
    $('#effective_date').datepicker({
        format: "yyyy-mm-dd",
        endDate: "now()",
        startView: 1,
        autoclose: true
    });
    
    // clear error messgaes
    $(document).on('change', '.form-control, .custom-control-input, .custom-file-input, .declaration_signature', function() {
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
            $('.landlord').prop('required', false).val('');
        }
    });

    /** General Information End **/
    

    /** Section - Household Information **/

    // delete household income row
    $(document).on('click', '.del_household', function() {
        var num = $(this).attr('num');
        var chk = confirm('Remove Person #' + num+ '?');
        if (chk) {
            $('#household_row_'+num).remove();
            $('#uploads_row_'+num).remove();
            hiTotal();
        }
    });

    // sum total income
    $(document).on('change', '.hi_income', function() {
        hiTotal();
    });

    // change name of household person in uploads
    $(document).on('change', '.hi_name', function() {
        var count = $(this).attr('count');
        var name = $('#hi_first_name_'+count).val()+' '+$('#hi_surname_'+count).val();
        $('#hi_name_'+count+'_span').html(name);
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

    // change company name after entered
    $(document).on('change', '#emp_name', function(){
        // var empname = $(this).val();
        $('.empNameText').html($(this).val());
    });

    // change gender of applicant after entered
    $(document).on('change', '.gender', function(){
        var gender = $('[name="gender"]:checked').val();
        $('.hi_gender_'+ gender).prop('checked', true);
    });
            
    // change ID uploads based on ID state
    $(document).on('change', '[name="national_id_state"]', function(){
        var state = $(this).val();
        $('.id_card_state').addClass('hide');

        switch (state) {
            case 'Have identification':
                break;
        
            case 'Have EBC letter':
                $('#ebc_id_letter_row').removeClass('hide');
                break;
        
            case 'Lost but have police report':
                $('#lost_id_police_report_row').removeClass('hide');
                break;
        
            default:
                break;
        }
        idCardCheck();
    });
    
    // change proof of citizenship uploads of applicant after entered        
    $(document).on('change', '#proof_of_citizenship', function(){
        var proof = $(this).val();
        $('.proof_residence_row').addClass('hide');
        switch (proof) {
            case 'National ID':
            break;
            
            case 'Certificate of Immigration Status':
            $('.cert_immigration_status_row').removeClass('hide');
            break;
            
            case 'Certificate of Residence':
            $('.cert_residence_row').removeClass('hide');
            break;
            
            case 'Passport':
            $('.passport_row').removeClass('hide');
            break;
            
            default:
            break;
        }
        idCardCheck();
    });

});

function idCardCheck() {
    var state = $('[name="national_id_state"]').val();
    var proof = $('#proof_of_citizenship').val();
    if (state == 'Have identification' || proof == 'National ID') {
        $('.id_card_row').removeClass('hide');
    } else {
        $('.id_card_row').addClass('hide');
    }
}