@extends('emails.master')

@section('content')
    
<p class="text">
    <strong>Dear {{$application->applicant->name}}</strong>,
    <br><br>
    We regret to inform you that your application (<strong>reference # {{$application->reference_number}}</strong>) has been rejected by the Ministry of Social Development and Family Services.
    <br><br>
    Kind regards,
</p>

@endsection