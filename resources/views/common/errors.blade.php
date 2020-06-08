@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        {{-- {{dd($errors)}} --}}
        <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your form has {{count($errors)}} error{{count($errors) == 1? '' : 's'}}:</h3>
        <ol>
            @foreach ($errors->all() as $error)
                <li>{{ is_array($error) || is_object($error)? print_r($error) : $error }}</li>
            @endforeach
        </ol>
    </div>
@endif
