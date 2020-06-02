@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your form has {{count($errors)}} errors:</h3>
        <ol>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
@endif
