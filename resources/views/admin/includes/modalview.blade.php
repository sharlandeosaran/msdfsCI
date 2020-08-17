<!-- Modal -->
<div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="modalviewLabel">
    <div class="modal-dialog modal-xl" role="document" style="height: 90%">
        <div class="modal-content" style="height: 100%;">
            <div class="modal-body" id="modalviewbody" style="height: 90%; padding: 0;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // view application
    $(document).on('click', '.application_view', function (e) {
        var application = $(this).attr('application');
        $('#update_row').val(application);
        var page = "{{url('/admin/applications/view')}}/" + application;
        $('#modalviewbody').html('<iframe style="border: 0px; height: -webkit-fill-available; height: 100%;" src="' + page + '" width="100%"></iframe>');
    });
</script>