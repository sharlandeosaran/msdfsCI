@extends('emails.master')

@section('content')
    
<p class="text">
    <strong>Dear {{$application->applicant->name}}</strong>,
    <br><br>
    Your application (<strong>reference # {{$application->reference_number}}</strong>) has been approved by the Ministry of Social Development and Family Services.
    <br><br>
    You will be contacted when relief is available for collection.
    <br><br>
    Kind regards,
</p>

@endsection