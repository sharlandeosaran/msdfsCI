/* unlock tabs if return with errors */
@if (count($errors) > 0)
setInterval(() => {
    $('li[role="tab"]').removeClass('disabled').addClass('done');
}, 100);
@endif


// change classification of applicant after entered
var emp_list = {!! json_encode(employment_list()) !!};
$(document).on('change', '[name="employment_classification"]', function(){
    var classification = $(this).val();
    $('#hi_emp_classification').val(emp_list[classification]);
});
