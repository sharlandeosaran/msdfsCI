@extends('emails.master')

@section('content')
    
<p class="text">
    <strong>Dear {{$application->applicant->name}}</strong>,
    <br><br>
    reference number <strong>{{$application->reference_number}}</strong> <br>
    ** message to applicant **
    
</p>

@endsection