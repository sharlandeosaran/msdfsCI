/* unlock tabs if return with errors */
@if (count($errors) > 0)
setInterval(() => {
    $('li[role="tab"]').removeClass('disabled').addClass('done');
}, 100);
@endif

/* focus on name when page loads */
/* @if (!session('success') && count($errors) <= 0)
    $('#name').focus();
@endif */

