@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{route('schedules')}}">Schedules</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="my-0">
                        By {{$schedule->createdBy->name}} on {{$schedule->since}}
                    
                    <a href="{{route('schedules')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> back to schedules</a>
                    <a class="btn btn-success pull-right" href="{{url('/admin/schedules/pdf/'.$schedule->id)}}" target="_blank"><i class="fas fa-file-pdf fa-lg"></i> export</a>
                    
                    </h3>
                </div>
                
                <div class="box-body">
                    
                    @if ($schedule->type_id == 1)
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="danger">
                                            <th>No.</th>
                                            <th>Ref No.</th>
                                            <th>Applicant Name</th>
                                            <th>ID Card #</th>
                                            <th>Address</th>
                                            <th>Item</th>
                                            <th>Amount</th>
                                            <th>Total TTD</th>
                                            <th>Invoice</th>
                                            <th>Landlord</th>
                                            <th>Contact#</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($schedule->schedule_applications() as $row)
                                            <tr>
                                                <td>{{$row->number}}</td>
                                                <td>{{$row->reference_number}}</td>
                                                <td>{{$row->applicant_name}}</td>
                                                <td>{{$row->id_card}}</td>
                                                <td>{!! $row->address !!}</td>
                                                <td>
                                                    {!! $row->schedule_rent->item !!}
                                                </td>
                                                <td>
                                                    {{$row->schedule_rent->amount}}
                                                </td>
                                                <td>{{$row->total}}</td>
                                                <td>{{$row->invoice}}</td>
                                                <td>
                                                    {{$row->schedule_rent->landlord}}
                                                </td>
                                                <td>{{$row->contact}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    @endif

                    @if ($schedule->type_id == 2)
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="danger">
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
                                </thead>

                                <tbody>
                                    <tr>
                                        @foreach ($schedule->schedule_applications() as $row)
                                            <tr>
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
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    @endif

                    @if ($schedule->type_id == 3)
                    <div class="tab-pane" id="tab_3">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="danger">
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
                                </thead>

                                <tbody>
                                    @foreach ($schedule->schedule_applications() as $row)
                                        <tr>
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
                                
                            </table>
                        </div>
                    </div>
                    @endif

                    @if ($schedule->type_id == 4)
                    <div class="tab-pane" id="tab_4">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="danger">
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
                                </thead>

                                <tbody>
                                    @foreach ($schedule->schedule_applications() as $row)
                                        <tr>
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
                                
                            </table>
                        </div>
                    </div>
                    @endif
                    
                </div>

                {{-- <div class="box-footer">
                    <a href="{{route('schedules')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> back to schedules</a>
                </div> --}}
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script>
    $(function () {
        
    })
</script>
@endsection