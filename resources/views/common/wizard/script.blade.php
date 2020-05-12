{{-- unlock tabs if return with errors --}}
@if (count($errors) > 0)
$('li[role="tab"]').removeClass('disabled').addClass('done');
@endif

{{-- focus on name when page loads --}}
{{-- @if (!session('success') && count($errors) <= 0)
    $('#name').focus();
@endif --}}