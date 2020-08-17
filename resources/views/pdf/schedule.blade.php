@extends('pdf.master')

@section('content')
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        
        <thead>
            
            <tr>
                <td colspan="11" style="padding: 0">
                    <table>
                        <tr>
                            <td class="title" width="20%">
                                <img src="{{url('/')}}/img/msdfs_logo.jpg" alt="MSDFS Logo" style="width:150px;">
                                {{-- <img src="{{public_path()}}/img/msdfs_logo.jpg" alt="MSDFS Logo" style="width:150px;"> --}}
                            </td>
                            <td width="60%">
                                <h1 style="margin-bottom: 15px; line-height: 35px;">Ministry Of The People And Social Development</h1>
                                <h2>{{$schedule->type}}</h2>
                            </td>
                            <td class="text-right" width="20%">
                                <h2>
                                    Schedule # <span class="label">{{$schedule->id}}</span>
                                </h2>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </thead>
        
        @if ($schedule->type_id == 1)
        <tbody style="margin-top: 50px">
            <tr class="heading line">
                <th width="5%">No.</th>
                <th width="5%">Ref No.</th>
                <th width="10%">Applicant Name</th>
                <th width="8%">ID Card #</th>
                <th width="14%">Address</th>
                <th width="15%">Item</th>
                <th width="7%">Amount</th>
                <th width="10%">Total TTD</th>
                <th width="8%">Invoice</th>
                <th width="10%">Landlord</th>
                <th width="8%">Contact#</th>
            </tr>
            
            @foreach ($schedule->schedule_applications() as $row)
                <tr class="details line">
                    <td>{{$row->number}}</td>
                    <td>{{$row->reference_number}}</td>
                    <td>{{$row->applicant_name}}</td>
                    <td>{{$row->id_card}}</td>
                    <td>{!! $row->address !!}</td>
                    <td>
                        {!! $row->schedule_rent->item !!}
                    </td>
                    <td>
                        ${{number_format($row->schedule_rent->amount, 2)}} x {{$row->schedule_rent->quantity == 1? $row->schedule_rent->quantity.' month' : $row->schedule_rent->quantity.' months'}} from {{ date('F Y', strtotime($row->schedule_rent->start_date)) }}
                    </td>
                    <td>${{number_format($row->total)}}</td>
                    <td>{{$row->invoice}}</td>
                    <td>
                        {{$row->schedule_rent->landlord}}
                    </td>
                    <td>{{$row->contact}}</td>
                </tr>
            @endforeach
        </tbody>
        @endif
        
        @if ($schedule->type_id == 2)
        <tbody style="margin-top: 50px">
            <tr class="heading line">
                <th width="5%">No.</th>
                <th width="5%">Ref No.</th>
                <th width="10%">Applicant Name</th>
                <th width="8%">ID Card #</th>
                <th width="14%">Address</th>
                <th width="7%">Quantity</th>
                <th width="15%">Items</th>
                <th width="10%">Cost TTD</th>
                <th width="10%">Supplier</th>
                <th width="8%">Invoice</th>
                <th width="8%">Contact#</th>
            </tr>
            
            @foreach ($schedule->schedule_applications() as $row)
                <tr class="details line">
                    <td>{{$row->number}}</td>
                    <td>{{$row->reference_number}}</td>
                    <td>{{$row->applicant_name}}</td>
                    <td>{{$row->id_card}}</td>
                    <td>{!! $row->address !!}</td>
                    <td>{!! $row->items['quantity'] !!}</td>
                    <td>{!! $row->items['item'] !!}</td>
                    <td>{!! $row->items['cost'] !!}</td>
                    <td>{{$row->supplier}}</td>
                    <td>{{$row->invoice}}</td>
                    <td>{{$row->contact}}</td>
                </tr>
            @endforeach
        </tbody>
        @endif
        
        @if ($schedule->type_id == 3)
        <tbody style="margin-top: 50px">
            <tr class="heading line">
                <th width="5%">No.</th>
                <th width="5%">Ref No.</th>
                <th width="10%">Applicant Name</th>
                <th width="8%">ID Card #</th>
                <th width="14%">Address</th>
                <th width="7%">Quantity</th>
                <th width="15%">Items</th>
                <th width="10%">Cost TTD</th>
                <th width="10%">Supplier</th>
                <th width="8%">Invoice</th>
                <th width="8%">Contact#</th>
            </tr>
            
            @foreach ($schedule->schedule_applications() as $row)
                <tr class="details line">
                    <td>{{$row->number}}</td>
                    <td>{{$row->reference_number}}</td>
                    <td>{{$row->applicant_name}}</td>
                    <td>{{$row->id_card}}</td>
                    <td>{!! $row->address !!}</td>
                    <td>{!! $row->items['quantity'] !!}</td>
                    <td>{!! $row->items['item'] !!}</td>
                    <td>{!! $row->items['cost'] !!}</td>
                    <td>{{$row->supplier}}</td>
                    <td>{{$row->invoice}}</td>
                    <td>{{$row->contact}}</td>
                </tr>
            @endforeach
        </tbody>
        @endif
        
        @if ($schedule->type_id == 4)
        <tbody style="margin-top: 50px">
            <tr class="heading line">
                <th width="5%">No.</th>
                <th width="5%">Ref No.</th>
                <th width="10%">Applicant Name</th>
                <th width="8%">ID Card #</th>
                <th width="14%">Address</th>
                <th width="7%">Quantity</th>
                <th width="15%">Items</th>
                <th width="10%">Cost TTD</th>
                <th width="10%">Supplier</th>
                <th width="8%">Invoice</th>
                <th width="8%">Contact#</th>
            </tr>
            
            @foreach ($schedule->schedule_applications() as $row)
                <tr class="details line">
                    <td>{{$row->number}}</td>
                    <td>{{$row->reference_number}}</td>
                    <td>{{$row->applicant_name}}</td>
                    <td>{{$row->id_card}}</td>
                    <td>{!! $row->address !!}</td>
                    <td>{!! $row->items['quantity'] !!}</td>
                    <td>{!! $row->items['item'] !!}</td>
                    <td>{!! $row->items['cost'] !!}</td>
                    <td>{{$row->supplier}}</td>
                    <td>{{$row->invoice}}</td>
                    <td>{{$row->contact}}</td>
                </tr>
            @endforeach
        </tbody>
        @endif
        
    </table>
</div>
@endsection

@section('footer')
@endsection 