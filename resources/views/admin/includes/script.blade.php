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
    sDom: 'lrtip',
    "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
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
    }, 100);
})

// setup ajax
$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});

// filter table
$(document).on('change', '.form-control, .form-check-input', function() {
    filtertable();
});