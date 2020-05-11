
$(function () {
    
    // initialize wizard
    $("#wizard").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "none",
        stepsOrientation: "horizontal",
        titleTemplate: '<span class="number">#title#</span>'
    });

    $(document).on('click', '[href="#next"], li.last', function() {
        // recaptcha load
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

    
    // $("input.phone").mask("(999) 999-9999");

    /* $(document).on('click', '[href="#next"]', function() {

        // console.log('press')
        $('[href="#next"]').each(function(i,e) {
            // console.log(i)
            // console.log(e)

        });
    }); */
});