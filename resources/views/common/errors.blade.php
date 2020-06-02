@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your form has errors:</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
