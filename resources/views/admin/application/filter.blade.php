@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/admin')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('filters')
<li class="treeview">
    <a href="#">
        <i class="fa fa-filter"></i>
        <span>Filters</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <div class="box box-danger">
                {{-- <div class="box-header with-border box-header-dark">
                    <h3 class="box-title" data-widget="collapse" style="cursor: pointer;"><i class="fa fa-filter"></i> Filters</h3>
                    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div> --}}
                <div class="box-body">
                
                    <form role="form" method="POST" action="#">
                        @csrf
                        
                        <fieldset>
                            {{-- <legend>{{$title}}</legend> --}}

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="string">Search String</label>
                                    <input type="text" class="form-control input" name="string" id="string" value="{{ old('string') }}">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="whole_string" checked="">
                                        Search whole string
                                    </label>
                                </div>
                                    <p class="help-block">Search in Activity, Description and Requested By.</p>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Exemption Type</label>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-check">
                                                <input class="form-check-input exemption_type" type="checkbox" value="inbound" id="type_inbound">
                                                <label class="form-check-label" for="type_inbound">
                                                    Inbound
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input exemption_type" type="checkbox" value="outbound" id="type_outbound">
                                                <label class="form-check-label" for="type_outbound">
                                                    Outbound
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Travel Party</label>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-check">
                                                <input class="form-check-input travel_party" type="checkbox" value="individual" id="type_individual">
                                                <label class="form-check-label" for="type_individual">
                                                    Individual
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input travel_party" type="checkbox" value="family" id="type_family">
                                                <label class="form-check-label" for="type_family">
                                                    Family
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input travel_party" type="checkbox" value="group" id="type_group">
                                                <label class="form-check-label" for="type_group">
                                                    Other Gorup
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Country</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($countries as $country)
                                                @if (in_array($country->id, $country_filter))
                                                    <div class="form-check" title="{{$country->country}}" data-toggle="tooltip">
                                                        <input class="form-check-input countries" type="checkbox" value="{{ $country->id }}" id="country_{{$country->id}}">
                                                        <label class="form-check-label" for="country_{{$country->id}}">
                                                            {{$country->country}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-12 hide">
                                <div class="form-group">
                                    <label class="control-label" for="stat">City</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: hidden scroll;">
                                        <div class="panel-body">
                                            @foreach($countries as $country)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{ $country->id }}" id="country_{{$country->id}}">
                                                    <label class="form-check-label" for="country_{{$country->id}}">
                                                        {{$country->country}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="complete_end_date">Date/ Period Received</label>
                                    <div class="input-daterange input-group datepicker" id="datepicker" style="padding: 0">
                                        <input type="text" class="form-control" style="font-size: 12px" id="period_start_date">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="form-control" style="font-size: 12px" id="period_end_date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" id="pay_for_quarantine_filter">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Pay For Quarantine</label>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-check">
                                                <input class="form-check-input quarantine_pay" type="checkbox" value="Y" id="quarantine_pay_Y">
                                                <label class="form-check-label" for="quarantine_pay_Y">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input quarantine_pay" type="checkbox" value="N" id="quarantine_pay_N">
                                                <label class="form-check-label" for="quarantine_pay_N">
                                                    No
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input quarantine_pay" type="checkbox" value="O" id="quarantine_pay_O">
                                                <label class="form-check-label" for="quarantine_pay_O">
                                                    Not Specified
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-default" id="reset">Reset</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="box-footer with-border">
                    <div class="box-tools pull-right">
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"> close</i>
                        </button> --}}
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
@endsection

@section('content')
<link href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" /> 
<link href="{{ asset('css/tables.css') }}" rel="stylesheet" /> 

<section class="content">
    
	<div class="col-md-12">
        @include('common.errors')
    </div>
        
    <div class="row">
        
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    {{-- <h3 class="box-title">Application Priorities</h3> --}}
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width='5%'>ID</th>
                                    <th width='25%'>Applicant</th>
                                    <th width='20%'>Form Type</th>
                                    <th width='20%'>Region</th>
                                    <th width='10%'>Status</th>
                                    <th width='15%'>Date</th>
                                    <th width='5%'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_rows">
                                @foreach ($applications as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        {!!$item->applicant->name!!} <br>
                                        ({{count($item->household_people)}} in household)
                                    </td>
                                    <td>
                                        {!!$item->form_type!!}
                                    </td>
                                    <td>
                                        {!!$item->applicant->region!!}
                                    </td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                                    <td><a href="#" class="btn btn-danger btn-xs application_view" data-toggle="modal" data-target="#modalview" application="{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> view</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant</th>
                                    <th>Form Type</th>
                                    <th>Region</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Modal -->
@include('admin.includes.modalview')
@endsection

@section('scripts')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" defer></script>

<!-- Include Date Range Picker -->
@include('admin.includes.datepicker')

<script type="text/javascript">
    $(function () {
        @include('admin.includes.script')

        // filter table with ajax
        function filtertable() {
            var data = {
                'exemption_types': $('.exemption_type:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'travel_party': $('.travel_party:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'countries': $('.countries:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'period_start': $('#period_start_date').val(),
                'period_end': $('#period_end_date').val(),
                'quarantine_pay': $('.quarantine_pay:checkbox:checked').map(function(){ return $(this).val(); }).get(),
            }
            
            $.ajax({
                type: 'POST',
                url: "{{route('applicationfilterajax')}}",
                data: data,
                success: function(response) {
                    // console.log(response)
                    // clear table
                    table.clear().draw();

                    jQuery.each(response.data, function(index, item) {
                        table.row.add( [
                            item.id,
                            item.first_name + ' ' + item.surname + '<br>' + item.email,
                            item.travel_party == 'Individual'? item.travel_party : item.travel_party + ' (' + item.applicants + ')',
                            item.exemption_type,
                            formatDate(item.created_at),
                            '<a href="#" class="btn btn-danger btn-xs application_view" data-toggle="modal" data-target="#modalview" application="' + item.id + '"><i class="fa fa-eye" aria-hidden="true"></i> view</a>'
                        ] ).draw( false );
                    });
                },
                error: function(response) {
                    // console.log(response)
                    alert(response.responseText.message)
                }
            });
        }
    })

    $(document).on('click', '.application_view', function (e) {
        var application = $(this).attr('application');
        var page = "{{url('/admin/applications/view')}}/" + application;
        $('#modalviewbody').html('<iframe style="border: 0px; height: -webkit-fill-available; height: 100%;" src="' + page + '" width="100%"></iframe>');
    })
</script>
@endsection
