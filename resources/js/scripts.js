$(function () {
    $('[data-toggle="tooltip"]').tooltip()
    
    $('form').submit(function(){
        $(':submit').html('loading...').addClass('disabled').prop('disabled', true);
    });
});