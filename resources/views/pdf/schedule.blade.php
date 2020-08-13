@extends('pdf.master')

@section('content')
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        
        <thead>
            
            <tr>
                <td colspan="8" style="padding: 0">
                    <table>
                        <tr>
                            <td class="title" width="20%">
                                <img src="{{url('/')}}/img/msdfs_logo.jpg" alt="MSDFS Logo" style="width:150px;">
                                {{-- <img src="{{public_path()}}/img/msdfs_logo.jpg" alt="MSDFS Logo" style="width:150px;"> --}}
                            </td>
                            <td width="60%">
                                <h1 style="margin-bottom: 15px; line-height: 35px;">Ministry Of The People And Social Development</h1>
                                <h2>Disaster Management Incident Assessment Form</h2>
                            </td>
                            <td class="text-right" width="20%">
                                <h2>
                                    Schedule #<br>
                                    <small style="font-size: 80%"></small>
                                </h2>
                                <h2>
                                    <span class="label">{{$schedule->id}}</span>
                                </h2>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </thead>
        
        <tbody style="margin-top: 50px">
            
            <tr class="heading line">
                <th><p>No.</p></th>
                <th><p>Ref. No.</p></th>
                <th><p>Applicant</p></th>
                <th class="text-right"><p>Created</p></th>
            </tr>
            
            @foreach ($schedule->applications() as $key => $application)
                <tr class="details line">
                    <td><p>{{$key}}</p></td>
                    <td><p>{{$application->form_critical_incident()->reference_number}}</p></td>
                    <td><p>{{$application->applicant->name}}</p></td>
                    <td class="text-right"><p>{{$application->since}}</p></td>
                </tr>
            @endforeach
            
            
        </tbody>
        
    </table>
</div>
@endsection

@section('footer')
@endsection 