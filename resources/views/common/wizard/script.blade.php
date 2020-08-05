/* unlock tabs if return with errors */
@if (count($errors) > 0)

    // add error warnings to the tabs
    var errors = {!! json_encode($errors->messages()) !!};
    // console.log(errors);

    var geninfo = [];
    $("#div-geninfo").find(".form-control").each(function(){ geninfo.push(this.id); });
    // console.log(geninfo);

    var household = [];
    $("#div-household").find(".form-control").each(function(){ household.push(this.id); });
    // console.log(household);

    var disaster = [];
    $("#div-disasterinfo").find(".form-control").each(function(){ disaster.push(this.id); });
    // console.log(disaster);

    var employer = [];
    $("#div-employer").find(".form-control").each(function(){ employer.push(this.id); });
    // console.log(employer);

    var recommender = [];
    $("#div-recommender").find(".form-control").each(function(){ recommender.push(this.id); });
    // console.log(recommender);

    var uploads = [];
    $("#div-uploads").find(".custom-file-input").each(function(){ uploads.push(this.id); });
    // console.log(uploads);

    // console.log(hasCommonElement(geninfo,errors));
    // console.log(hasCommonElement(household,errors));
    // console.log(hasCommonElement(disaster,errors));
    // console.log(hasCommonElement(uploads,errors));
    // console.log(hasCommonElement(employer,errors));
    // console.log(hasCommonElement(recommender,errors));

    setTimeout(function() {
        $('li[role="tab"]').removeClass('disabled').addClass('done');

        if(hasCommonElement(geninfo,errors)) errorClass($('span.number > i.fa-user'));
        if(hasCommonElement(household,errors)) errorClass($('span.number > i.fa-users'));
        if(hasCommonElement(disaster,errors)) errorClass($('span.number > i.fa-home'));
        if(hasCommonElement(uploads,errors)) errorClass($('span.number > i.fa-upload'));
        if(hasCommonElement(employer,errors)) errorClass($('span.number > i.fa-building'));
        if(hasCommonElement(recommender,errors)) errorClass($('span.number > i.fa-comment'));
        if(hasCommonElement(['declaration_signature'],errors)) errorClass($('span.number > i.fa-check'));
    }, 100);

    // clear error icon
    $(document).on('click', 'i.fa', function(){
        // console.log($(this).attr('class'));
        var original = $(this).attr('original');
        if(original) $(this).removeClass().addClass(original);
    });
@endif


// change classification of applicant after entered
var emp_list = {!! json_encode(employment_list()) !!};
$(document).on('change', '[name="employment_classification"]', function(){
    var classification = $(this).val();
    $('#hi_emp_classification').val(emp_list[classification]);
});

// change national ID after entered
$(document).on('change', '#national_id', function(){
    $('.nationalIDField').val($(this).val());
});

@if($errors->has('uploadfail'))
setTimeout(function() 
{
    $('.uploadfail').html('Choose file');
    $('.uploadhelp').val('');
}, 200);
@endif

function hasCommonElement(arr1,errors)
{
    var bExists = false;
    $.each(errors, function(index, value){
        var str = index.replace(".", "_");
        if($.inArray(str,arr1)!=-1){
            bExists = true;
        }
        
        if(bExists){
            return false;  //break
        }
    });
    return bExists;
}

function errorClass(e)
{
    var original = e.attr('class');
    e.attr('original', original);
    e.removeClass().addClass('fa fa-warning fa-3x text-danger');
}

// change employment classification after entered
var employment_list = {!! json_encode(employment_list()) !!}
$(document).on('change', '[name="employment_classification"]', function(){
    $('.employmentClassificationText').html(employment_list[$(this).val()]);
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
setTimeout(() => { dob(); }, 100);

// add household income rows
$(document).on('click', '.add_household', function() {
    var rows = $('.household_row').length;
    if (rows < 10) {
            
        // add income row
        $('#household_tbody').append('<tr class="household_row" id="household_row_'+householdCount+'"><td>    <div class="form-group" id="grp-name" style="margin-bottom: 0;"><input type="text" class="form-control form-control-sm hi_name" count="'+householdCount+'" id="hi_first_name_'+householdCount+'" name="hi_first_name['+householdCount+']" aria-describedby="" required maxlength="100" placeholder="First Name"><span class="help-block">    <strong id="err-name"></strong></span>    </div> <div class="form-group" id="grp-name" style="margin-bottom: 0;"><input type="text" class="form-control form-control-sm hi_name" count="'+householdCount+'" id="hi_surname_'+householdCount+'" name="hi_surname['+householdCount+']" aria-describedby="" required maxlength="100" placeholder="Surname"><span class="help-block">    <strong id="err-name"></strong></span>    </div> </td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_national_id_'+householdCount+'" name="hi_national_id['+householdCount+']" aria-describedby="" required maxlength="11"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-organization_type"><div class="custom-control custom-radio">    <input type="radio" id="hi_gender1_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="M">    <label class="custom-control-label" for="hi_gender1_'+householdCount+'">Male</label></div><div class="custom-control custom-radio">    <input type="radio" id="hi_gender2_'+householdCount+'" name="hi_gender['+householdCount+']" class="custom-control-input" value="F">    <label class="custom-control-label" for="hi_gender2_'+householdCount+'">Female</label></div><span class="help-block">    <strong id="err-organization_type"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_relationship_'+householdCount+'" name="hi_relationship['+householdCount+']" aria-describedby="" required maxlength="25"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm dob" id="hi_dob_'+householdCount+'" name="hi_dob['+householdCount+']" aria-describedby="" required placeholder="yyyy-mm-dd"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="text" class="form-control form-control-sm" id="hi_emp_status_'+householdCount+'" name="hi_emp_status['+householdCount+']" aria-describedby="" required maxlength="25"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td>    <div class="form-group" id="grp-name"><input type="number" min="0" step="1" class="form-control form-control-sm hi_income" id="hi_income_'+householdCount+'" name="hi_income['+householdCount+']" aria-describedby="" required value="0"><span class="help-block">    <strong id="err-name"></strong></span>    </div></td><td><button class="btn btn-sm btn-primary del_household" type="button" num="'+householdCount+'"><i class="fa fa-remove" aria-hidden="true"></i></button></td></tr>');

        // add uploads row
        $('#uploads_tbody').append('<tr id="uploads_row_'+householdCount+'"> <td class=" table-active text-right align-middle" width="20%"> <div class="form-group mb-0" id="grp-proof_of_earnings_'+householdCount+'"> <label class="control-label mb-0" for="proof_of_earnings_'+householdCount+'"> Proof of Earnings for <span id="hi_name_'+householdCount+'_span"></span> <i class="fa fa-info-circle" aria-hidden="true" title="Proof of actual earnings must be submitted such as a payslip or job letter for employed household members."></i> </label> </div> </td> <td width="80%"> <div class="input-group mb-0"> <div class="custom-file"> <input type="file" accept=".png, .jpg, .jpeg, .doc, .docx, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="proof_of_earnings_'+householdCount+'" name="proof_of_earnings['+householdCount+']" required> <label class="custom-file-label" for="proof_of_earnings_'+householdCount+'" id="proof_of_earnings_'+householdCount+'Label">Choose file</label> </div> </div><span class="help-block"> <strong id="err-proof_of_earnings_'+householdCount+'"></strong> </span> </td> </tr>');

        // increment count
        householdCount++;
        
        dob();
    }

});