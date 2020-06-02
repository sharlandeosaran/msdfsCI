/* unlock tabs if return with errors */
@if (count($errors) > 0)
setInterval(() => {
    $('li[role="tab"]').removeClass('disabled').addClass('done');
}, 100);
@endif

