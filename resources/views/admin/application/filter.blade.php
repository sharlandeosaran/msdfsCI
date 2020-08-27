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
                                    <label class="control-label" for="stat">Form Type</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($forms as $form)
                                                <div class="form-check" title="{{$form->form}}" data-toggle="tooltip">
                                                    <input class="form-check-input forms" type="checkbox" value="{{ $form->id }}" id="form_{{$form->id}}">
                                                    <label class="form-check-label" for="form_{{$form->id}}">
                                                        {{$form->form}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Status</label>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            @foreach($status as $stat)
                                            <div class="form-check">
                                                <input class="form-check-input status" type="checkbox" value="{{ $stat->id }}" id="status_{{$stat->id}}">
                                                <label class="form-check-label" for="status_{{$stat->id}}">
                                                    {{$stat->status}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Regions</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($regions as $region)
                                                @if (in_array($region->id, $region_filter))
                                                    <div class="form-check" title="{{$region->region}}" data-toggle="tooltip">
                                                        <input class="form-check-input regions" type="checkbox" value="{{ $region->id }}" id="region_{{$region->id}}">
                                                        <label class="form-check-label" for="region_{{$region->id}}">
                                                            {{$region->region}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Communities</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($communities as $community)
                                                @if (in_array($community->id, $community_filter))
                                                    <div class="form-check" title="{{$community->community}}" data-toggle="tooltip">
                                                        <input class="form-check-input communities" type="checkbox" value="{{ $community->id }}" id="community_{{$community->id}}">
                                                        <label class="form-check-label" for="community_{{$community->id}}">
                                                            {{$community->community}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Lost/Damaged Items</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($items as $item)
                                                @if (in_array($item->id, $item_filter))
                                                    <div class="form-check" title="{{$item->item}}" data-toggle="tooltip">
                                                        <input class="form-check-input items" type="checkbox" value="{{ $item->id }}" id="item_{{$item->id}}">
                                                        <label class="form-check-label" for="item_{{$item->id}}">
                                                            {{$item->item}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">National ID States</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($id_states as $id_state)
                                                <div class="form-check" title="{{$id_state->id_state}}" data-toggle="tooltip">
                                                    <input class="form-check-input id_states" type="checkbox" value="{{ $id_state->id }}" id="id_state_{{$id_state->id}}">
                                                    <label class="form-check-label" for="id_state_{{$id_state->id}}">
                                                        {{$id_state->id_state}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Insurer</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($insurers as $insurer_name)
                                                <div class="form-check" title="{{$insurer_name->insurer_name}}" data-toggle="tooltip">
                                                    <input class="form-check-input insurers" type="checkbox" value="{{ $insurer_name->id }}" id="insurer_name_{{$insurer_name->id}}">
                                                    <label class="form-check-label" for="insurer_name_{{$insurer_name->id}}">
                                                        {{$insurer_name->insurer_name}}
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
                            
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Relationships</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($relationships as $relationship)
                                                <div class="relationship-check" title="{{$relationship->relationship}}" data-toggle="tooltip">
                                                    <input class="form-check-input relationships" type="checkbox" value="{{ $relationship->id }}" id="relationship_{{$relationship->id}}">
                                                    <label class="form-check-label" for="relationship_{{$relationship->id}}">
                                                        {{$relationship->relationship}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Incomes</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($incomes as $income)
                                                <div class="income-check" title="{{$income->income}}" data-toggle="tooltip">
                                                    <input class="form-check-input incomes" type="checkbox" value="{{ $income->id }}" id="income_{{$income->id}}">
                                                    <label class="form-check-label" for="income_{{$income->id}}">
                                                        {{$income->income}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Disasters</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($disasters as $disaster)
                                                <div class="disaster-check" title="{{$disaster->disaster}}" data-toggle="tooltip">
                                                    <input class="form-check-input disasters" type="checkbox" value="{{ $disaster->id }}" id="disaster_{{$disaster->id}}">
                                                    <label class="form-check-label" for="disaster_{{$disaster->id}}">
                                                        {{$disaster->disaster}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Employment Status</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($employments as $employment)
                                                <div class="employment-check" title="{{$employment->status}}" data-toggle="tooltip">
                                                    <input class="form-check-input employments" type="checkbox" value="{{ $employment->id }}" id="employment_{{$employment->id}}">
                                                    <label class="form-check-label" for="employment_{{$employment->id}}">
                                                        {{$employment->status}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Marital Status</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($marital_status as $status)
                                                <div class="status-check" title="{{$status->status}}" data-toggle="tooltip">
                                                    <input class="form-check-input marital_status" type="checkbox" value="{{ $status->id }}" id="marital_status_{{$status->id}}">
                                                    <label class="form-check-label" for="marital_status_{{$status->id}}">
                                                        {{$status->status}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Housing Type</label>
                                    <div class="panel panel-default" style="max-height: 200px; overflow: auto;">
                                        <div class="panel-body">
                                            @foreach($housing_types as $housing_type)
                                                <div class="housing_type-check" title="{{$housing_type->type}}" data-toggle="tooltip">
                                                    <input class="form-check-input housing_types" type="checkbox" value="{{ $housing_type->id }}" id="housing_type_{{$housing_type->id}}">
                                                    <label class="form-check-label" for="housing_type_{{$housing_type->id}}">
                                                        {{$housing_type->type}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" id="">
                                <div class="form-group">
                                    <label class="control-label" for="stat">Housing Damages</label>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-check">
                                                <input class="form-check-input housing_damages" type="checkbox" value="Y" id="housing_damages_Y">
                                                <label class="form-check-label" for="housing_damages_Y">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input housing_damages" type="checkbox" value="N" id="housing_damages_N">
                                                <label class="form-check-label" for="housing_damages_N">
                                                    No
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
<input type="hidden" id="update_row">
<input type="hidden" id="rowId">

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
                                    <th width='5%'>Ref #</th>
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
                                    <td>{{$item->reference_number}}</td>
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
                                    <th>Ref #</th>
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
@endsection

@section('scripts')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" defer></script>

<!-- Application View Modal -->
@include('admin.includes.modalview')

<!-- Include Date Range Picker -->
@include('admin.includes.datepicker')

<script type="text/javascript">
    $(function () {
        @include('admin.includes.script')

        // filter table with ajax
        function filtertable() {
            var data = {
                'forms': $('.forms:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'status': $('.status:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'regions': $('.regions:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'communities': $('.communities:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'items': $('.items:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'id_states': $('.id_states:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'insurers': $('.insurers:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'relationships': $('.relationships:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'incomes': $('.incomes:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'disasters': $('.disasters:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'employments': $('.employments:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'marital_status': $('.marital_status:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'housing_types': $('.housing_types:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'housing_damages': $('.housing_damages:checkbox:checked').map(function(){ return $(this).val(); }).get(),
                'period_start': $('#period_start_date').val(),
                'period_end': $('#period_end_date').val(),
            }
            
            $.ajax({
                type: 'POST',
                url: "{{route('applicationfilterajax')}}",
                data: data,
                success: function(response) {
                    // console.log(response)
                    // clear table
                    table.clear().draw();

                    $.each(response.data, function(index, item) {
                        table.row.add( [
                            item.reference_number,
                            item.first_name + ' ' + item.surname + '<br>(' + item.applicants + ' in household)',
                            item.form,
                            item.region,
                            item.status,
                            formatDate(item.created_at),
                            '<a href="#" class="btn btn-danger btn-xs application_view" data-toggle="modal" data-target="#modalview" application="' + item.application_id + '"><i class="fa fa-eye" aria-hidden="true"></i> view</a>'
                        ] ).draw( false );
                    });
                },
                error: function(response) {
                    // console.log(response)
                    alert(response.responseJSON.msg)
                }
            });
        }

        // value to update after row viewed
        $('#example1').on( 'click', 'tr', function () {
            var id = table.row( this ).index();
            $('#rowId').val(id);
            // console.log(table.row( this ).index())
            // console.log( 'Clicked row id '+ id );
        } );

        // update row after modal closed
        $('#modalview').on('hidden.bs.modal', function (e) {
            setTimeout(() => {
                var update_row = $('#update_row').val();
                var rowId = $('#rowId').val();
                var data = {
                    'id': update_row,
                }
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('updatedrowajax')}}",
                    data: data,
                    success: function(response) {
                        // console.log(response)
                        // console.log(response.data[0])
                        
                        // update changed row
                        newData = [
                            response.data[0].reference_number,
                            response.data[0].first_name + ' ' + response.data[0].surname + '<br>(' + response.data[0].applicants + ' in household)',
                            response.data[0].form,
                            response.data[0].region,
                            response.data[0].status,
                            formatDate(response.data[0].created_at),
                            '<a href="#" class="btn btn-danger btn-xs application_view" data-toggle="modal" data-target="#modalview" application="' + response.data[0].application_id + '"><i class="fa fa-eye" aria-hidden="true"></i> view</a>'
                        ];
                        table.row(rowId).data( newData ).draw(false);
                    },
                    error: function(response) {
                        // console.log(response)
                        alert(response.responseJSON.msg)
                    }
                });
            }, 1000);
        });
    })
</script>
@endsection
