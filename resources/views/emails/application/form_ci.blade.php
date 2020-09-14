@extends('emails.master')

@section('content')
    
<p class="text">
    <strong>Dear {{$application->applicant->name}}</strong>,
    <br><br>
    Your submission was successfully received by the Ministry of Social Development and Family Services. <br>
    Your application reference #  {{$application->reference_number}}. <br>
    If approved you will be contacted at a later date. <br>
    You may contact 000-0000 Ext.000 to query your application.
    <br><br>
    Kind regards,
</p>

@endsection