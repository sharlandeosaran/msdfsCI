var table = $('#example1').DataTable({
    "pagingType": "full_numbers",
    "lengthMenu": [
    [50, 100, 200, -1],
    [50, 100, 200, "All"]
    ],
    responsive: true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search table",
    },
    // sDom: 'lrtip',
    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
    "order": [[ 0, "desc" ]]
});

$('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
});

// reset table
$(document).on('click', '#reset', function() {
    setTimeout(() => {
        filtertable();
        filterchips();
    }, 100);
})

// setup ajax
$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});

// filter table
$(document).on('change', '.form-control, .form-check-input', function() {
    filtertable();
    filterchips();
});

// add chips when filter applied
function filterchips() {
    $('.chips').remove();
    $(".filter").each(function(){
        var val = $(this).val();
        if (val) {
            $('#chipsrow').append('<span class="label label-danger chips">'+ $(this).attr('label') +': '+ val +' <button class="btn btn-xs btn-link chipclose" filter="'+ $(this).prop('id') +'">x</button></span>');
        }
    });
    $(".form-check-input:checked").each(function(){
        var val = $(this).next('label').text();
        if (val) {
            $('#chipsrow').append('<span class="label label-danger chips">'+ $(this).attr('label') +': '+ val +' <button class="btn btn-xs btn-link chipcheckclose" filter="'+ $(this).prop('id') +'">x</button></span>');
        }
    });
}

// remove chips and clear filter
$(document).on('click', '.chipclose', function() {
   var id = $(this).attr('filter');
   $('#'+id).val('');
   $(this).parent().remove();
   filtertable();
});
$(document).on('click', '.chipcheckclose', function() {
   var id = $(this).attr('filter');
   $('#'+id).prop('checked', false);
   $(this).parent().remove();
   filtertable();
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