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
    // console.log(hasCommonElement(uploads,errors));
    // console.log(hasCommonElement(employer,errors));
    // console.log(hasCommonElement(recommender,errors));

    setTimeout(function() {
        $('li[role="tab"]').removeClass('disabled').addClass('done');

        if(hasCommonElement(geninfo,errors)) errorClass($('span.number > i.fa-user'));
        if(hasCommonElement(household,errors)) errorClass($('span.number > i.fa-home'));
        if(hasCommonElement(uploads,errors)) errorClass($('span.number > i.fa-upload'));
        if(hasCommonElement(employer,errors)) errorClass($('span.number > i.fa-building'));
        if(hasCommonElement(recommender,errors)) errorClass($('span.number > i.fa-comment'));
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