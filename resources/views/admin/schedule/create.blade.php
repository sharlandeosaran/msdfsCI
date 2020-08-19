@extends('admin.app')

@section('content')

<section class="content" style="font-size: 15px">
    
    @include('common.errors')

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs nav-justified">
                    @if (isset($list['rental']))
                        <li class="active"><a href="#rental" data-toggle="tab">Rental Assistance <span class="badge" style="margin-left: 5px">{{count($list['rental'])}}</span></a></li>
                    @endif
                    
                    @if (isset($list['household']))
                        <li class="{{isset($list['rental'])? '' : 'active'}}"><a href="#household" data-toggle="tab">Household Items <span class="badge" style="margin-left: 5px">{{count($list['household'])}}</span></a></li>
                    @endif
                    
                    @if (isset($list['school']))
                        <li class="{{isset($list['rental']) || isset($list['household'])? '' : 'active'}}"><a href="#school" data-toggle="tab">School Supplies <span class="badge" style="margin-left: 5px">{{count($list['school'])}}</span></a></li>
                    @endif
                    
                    @if (isset($list['clothing']))
                        <li class="{{isset($list['rental']) || isset($list['household']) || isset($list['school'])? '' : 'active'}}"><a href="#clothing" data-toggle="tab">Clothing <span class="badge" style="margin-left: 5px">{{count($list['clothing'])}}</span></a></li>
                    @endif
                </ul>

                <div class="tab-content">

                    @if (isset($list['rental']))
                        <div class="tab-pane active" id="rental">
                            <form action="" method="POST" id="rentalForm">
                                @foreach ($list['rental'] as $key => $item)
                                    @if (!$item['scheduled'])
                                        <input type="hidden" class="rental_application" value="{{$item['application']}}">

                                        <div class="panel panel-default">
                                            <div class="table-responsive critical_household_row">
                                                <table class="table table-bordered table-sm mb-0">
                                                    <tbody>
                                                        <tr class=" active text-center">
                                                            <td colspan="2">
                                                                Reference Number | <strong>{{$item['ref_num']}}</strong>
                                                                <button type="button" class="btn btn-danger btn-xs application_view pull-right" data-toggle="modal" data-target="#modalview" application="{{$item['application']}}"><i class="fa fa-eye" aria-hidden="true"></i> view</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Applicant Name 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['applicant_name']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        ID Card # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['id_card']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Address 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{!!$item['address']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Item 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{!!$item['item']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Amount 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['amount']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Total 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['total']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-rental_invoice_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Invoice 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-rental_invoice_{{$key}}">
                                                                    <input type="text" class="form-control rental_invoice" id="rental_invoice_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-rental_invoice_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Landlord 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['landlord']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Contact # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['contact']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block red">
                                            <div id="err-rental"></div>
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger pull-right btnSubmitRentalForm">Create Rental Assistance Schedule <i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if (isset($list['household']))
                        <div class="tab-pane {{isset($list['rental'])? '' : 'active'}}" id="household">
                            <form action="" method="POST" id="householdForm">
                                @foreach ($list['household'] as $key => $item)
                                    @if (!$item['scheduled'])
                                        <input type="hidden" class="household_application" value="{{$item['application']}}">

                                        <div class="panel panel-default">
                                            <div class="table-responsive critical_household_row">
                                                <table class="table table-bordered table-sm mb-0">
                                                    <tbody>
                                                        <tr class=" active text-center">
                                                            <td colspan="2">
                                                                Reference Number | <strong>{{$item['ref_num']}}</strong>
                                                                <button type="button" class="btn btn-danger btn-xs application_view pull-right" data-toggle="modal" data-target="#modalview" application="{{$item['application']}}"><i class="fa fa-eye" aria-hidden="true"></i> view</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Applicant Name 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['applicant_name']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        ID Card # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['id_card']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Address 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{!!$item['address']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-household_items_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Items 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                @foreach ($item['items'] as $num => $item_lost)
                                                                    <div class="form-group mb-0 grp-household_items_{{$num}}_{{$key}}">
                                                                        <div class="input-group mb-1">
                                                                            <span class="input-group-addon" id="basic-addon1">{{$item_lost['item']}}</span>
                                                                            <div class="input-group" style="width: 100%;">
                                                                                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-font fa-fw"></i></span>
                                                                                <input type="text" placeholder="item description" class="form-control household_items" id="household_items_{{$num}}_{{$key}}" num="{{$num}}" key="{{$key}}" required>
                                                                            </div>
                                                                            <div class="input-group" style="width: 100%;">
                                                                                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-dollar fa-fw"></i></span>
                                                                                <input type="number" min="0" step="0.01" max="{{$item_lost['cost']}}" placeholder="max {{number_format($item_lost['cost'],2)}} before VAT" class="form-control household_costs" id="household_costs_{{$num}}_{{$key}}" num="{{$num}}" key="{{$key}}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                
                                                                <div class="form-group mb-0 grp-household_items_{{$key}}">
                                                                    <span class="help-block red" id="err-household_items_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-household_supplier_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Supplier 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-household_supplier_{{$key}}">
                                                                    <input type="text" class="form-control household_supplier" id="household_supplier_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-household_supplier_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-household_invoice_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Invoice 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-household_invoice_{{$key}}">
                                                                    <input type="text" class="form-control household_invoice" id="household_invoice_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-household_invoice_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-household_contact_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Contact # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-household_contact_{{$key}}">
                                                                    <input type="text" class="form-control household_contact" id="household_contact_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-household_contact_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block red">
                                            <div id="err-household"></div>
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger pull-right btnSubmitHouseholdForm">Create Household Schedule <i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if (isset($list['school']))
                        <div class="tab-pane {{isset($list['rental']) || isset($list['household'])? '' : 'active'}}" id="school">
                            <form action="" method="POST" id="schoolForm">
                                @foreach ($list['school'] as $key => $item)
                                    @if (!$item['scheduled'])
                                        <input type="hidden" class="school_application" value="{{$item['application']}}">
                                        <input type="hidden" class="school_total" value="0">

                                        <div class="panel panel-default">
                                            <div class="table-responsive critical_household_row">
                                                <table class="table table-bordered table-sm mb-0">
                                                    <tbody>
                                                        <tr class=" active text-center">
                                                            <td colspan="2">
                                                                Reference Number | <strong>{{$item['ref_num']}}</strong>
                                                                <button type="button" class="btn btn-danger btn-xs application_view pull-right" data-toggle="modal" data-target="#modalview" application="{{$item['application']}}"><i class="fa fa-eye" aria-hidden="true"></i> view</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Applicant Name 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['applicant_name']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        ID Card # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['id_card']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Address 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{!!$item['address']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-school_quantity_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Quantity 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-school_quantity_{{$key}}" id="div-school_quantity_{{$key + 1}}">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">#1</span>
                                                                        <input type="number" min="0" step="1" class="form-control school_quantity" id="school_quantity_{{$key + 1}}_{{$key}}" num="{{$key + 1}}" key="{{$key}}" aria-describedby="basic-addon1" value="" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group mb-0 grp-school_quantity_{{$key}}">
                                                                    <span class="help-block red" id="err-school_quantity_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-school_items_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Items 
                                                                        <button type="button" class="btn btn-success btn-xs add_grant_item" title="add item" grant="school" num="{{$key + 1}}" key="{{$key}}"><i class="fas fa-plus"></i></button>
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-school_items_{{$key}}" id="div-school_item_{{$key + 1}}">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">#1</span>
                                                                        <input type="text" class="form-control school_items" id="school_items_{{$key + 1}}_{{$key}}" num="{{$key + 1}}" key="{{$key}}" aria-describedby="basic-addon1" value="" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group mb-0 grp-school_items_{{$key}}">
                                                                    <span class="help-block red" id="err-school_items_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-school_costs_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Cost 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-school_costs_{{$key}}" id="div-school_cost_{{$key + 1}}">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="">#1</span>
                                                                        <span class="input-group-addon" id="">$</span>
                                                                        <input type="number" min="0" step="0.01" class="form-control school_costs" id="school_costs_{{$key + 1}}_{{$key}}" num="{{$key + 1}}" key="{{$key}}" aria-describedby="" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group mb-0 grp-school_costs_{{$key}}">
                                                                    <span class="help-block red" id="err-school_costs_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Total 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0"><span>0</span> of {!!$item['total']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-school_supplier_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Supplier 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-school_supplier_{{$key}}">
                                                                    <input type="text" class="form-control school_supplier" id="school_supplier_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-school_supplier_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-school_invoice_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Invoice 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-school_invoice_{{$key}}">
                                                                    <input type="text" class="form-control school_invoice" id="school_invoice_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-school_invoice_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-school_contact_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Contact # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-school_contact_{{$key}}">
                                                                    <input type="text" class="form-control school_contact" id="school_contact_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-school_contact_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block red">
                                            <div id="err-school"></div>
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger pull-right btnSubmitSchoolForm">Create School Supplies Schedule <i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if (isset($list['clothing']))
                        <div class="tab-pane {{isset($list['rental']) || isset($list['household']) || isset($list['school'])? '' : 'active'}}" id="clothing">
                            <form action="" method="POST" id="clothingForm">
                                @foreach ($list['clothing'] as $key => $item)
                                    @if (!$item['scheduled'])
                                        <input type="hidden" class="clothing_application" value="{{$item['application']}}">
                                        <input type="hidden" class="clothing_total" value="0">

                                        <div class="panel panel-default">
                                            <div class="table-responsive critical_household_row">
                                                <table class="table table-bordered table-sm mb-0">
                                                    <tbody>
                                                        <tr class=" active text-center">
                                                            <td colspan="2">
                                                                Reference Number | <strong>{{$item['ref_num']}}</strong>
                                                                <button type="button" class="btn btn-danger btn-xs application_view pull-right" data-toggle="modal" data-target="#modalview" application="{{$item['application']}}"><i class="fa fa-eye" aria-hidden="true"></i> view</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Applicant Name 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['applicant_name']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        ID Card # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{{$item['id_card']}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Address 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0">{!!$item['address']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-clothing_quantity_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Quantity 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-clothing_quantity_{{$key}}" id="div-clothing_quantity_{{$key + 1}}">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">#1</span>
                                                                        <input type="number" min="0" step="1" class="form-control clothing_quantity" id="clothing_quantity_{{$key + 1}}_{{$key}}" num="{{$key + 1}}" key="{{$key}}" aria-describedby="basic-addon1" value="" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group mb-0 grp-clothing_quantity_{{$key}}">
                                                                    <span class="help-block red" id="err-clothing_quantity_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-clothing_items_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Items 
                                                                        <button type="button" class="btn btn-success btn-xs add_grant_item" title="add item" grant="clothing" num="{{$key + 1}}" key="{{$key}}"><i class="fas fa-plus"></i></button>
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-clothing_items_{{$key}}" id="div-clothing_item_{{$key + 1}}">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="basic-addon1">#1</span>
                                                                        <input type="text" class="form-control clothing_items" id="clothing_items_{{$key + 1}}_{{$key}}" num="{{$key + 1}}" key="{{$key}}" aria-describedby="basic-addon1" value="" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group mb-0 grp-clothing_items_{{$key}}">
                                                                    <span class="help-block red" id="err-clothing_items_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-clothing_costs_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Cost 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-clothing_costs_{{$key}}" id="div-clothing_cost_{{$key + 1}}">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" id="">#1</span>
                                                                        <span class="input-group-addon" id="">$</span>
                                                                        <input type="number" min="0" step="0.01" class="form-control clothing_costs" id="clothing_costs_{{$key + 1}}_{{$key}}" num="{{$key + 1}}" key="{{$key}}" aria-describedby="" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group mb-0 grp-clothing_costs_{{$key}}">
                                                                    <span class="help-block red" id="err-clothing_costs_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active text-right align-middle" width="20%">
                                                                <div class="form-group mb-0">
                                                                    <label class="control-label mb-0" for="">
                                                                        Total 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0">
                                                                    <p class="form-control-static py-0"><span>0</span> of {!!$item['total']!!}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-clothing_supplier_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Supplier 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-clothing_supplier_{{$key}}">
                                                                    <input type="text" class="form-control clothing_supplier" id="" name="" value="" required>

                                                                    <span class="help-block red" id="err-clothing_supplier_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-clothing_invoice_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Invoice 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-clothing_invoice_{{$key}}">
                                                                    <input type="text" class="form-control clothing_invoice" id="clothing_invoice_{{$key}}" name="" value="" required>

                                                                    <span class="help-block red" id="err-clothing_invoice_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="success text-right align-middle" width="20%">
                                                                <div class="form-group mb-0 grp-clothing_contact_{{$key}}">
                                                                    <label class="control-label mb-0" for="">
                                                                        Contact # 
                                                                        <i class="fa fa-info-circle hide" aria-hidden="true"></i>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td width="80%">
                                                                <div class="form-group mb-0 grp-clothing_contact_{{$key}}">
                                                                    <input type="text" class="form-control clothing_contact" id="" name="" value="" required>

                                                                    <span class="help-block red" id="err-clothing_contact_{{$key}}"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="help-block red">
                                            <div id="err-clothing"></div>
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger pull-right btnSubmitClothingForm">Create Clothing Schedule <i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</section>
@endsection

@section('scripts')

<!-- Application View Modal -->
@include('admin.includes.modalview')

<script>

    // setup ajax
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    // post clothing schedule
    $(document).on('click', '.btnSubmitClothingForm', function() {
        // var chk = 
        if (confirm('Post Clothing Schedule?')) {
            var all_costs = $('.clothing_costs');
            var all_items = $('.clothing_items');
            var all_quantity = $('.clothing_quantity');
            var costs = [];
            var items = [];
            var quantity = [];

            // create costs array
            $.each(all_costs, function(i, e) {
                costs.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })

            // create items array
            $.each(all_items, function(i, e) {
                items.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })

            // create quantity array
            $.each(all_quantity, function(i, e) {
                quantity.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })
            
            var data = {
                'clothing_application': $('.clothing_application').map(function(){ return $(this).val(); }).get(),
                'clothing_supplier': $('.clothing_supplier').map(function(){ return $(this).val(); }).get(),
                'clothing_invoice': $('.clothing_invoice').map(function(){ return $(this).val(); }).get(),
                'clothing_contact': $('.clothing_contact').map(function(){ return $(this).val(); }).get(),

                'clothing_items': items,
                'clothing_costs': costs,
                'clothing_quantity': quantity,
            }
            // console.log(data)
            
            $.ajax({
                type: 'POST',
                url: "{{route('clothingschedulepost')}}",
                data: data,
                success: function(response) {
                    // console.log(response)
                    success(response.msg)
                    var url = "{{url('/admin/schedule/view')}}/"+ response.id;
                    $('#clothing').html('<p class="text-success"><strong><i class="fas fa-clipboard-check"></i> '+response.msg+'</strong></p><a href="'+ url +'" target="_blank" class="btn btn-success btn-xs"><i class="fas fa-external-link-alt"></i> view schedule</a>');
                },
                error: function(response) {
                    // console.log(response)
                    failure('Process failed!')
                    $('#err-clothing').html(response.responseJSON.msg)

                    var errors = response.responseJSON.errors;
                    
                    //** use the items and costs arrays above to do the error feedback **

                    // console.log(errors)
                    if (errors) {
                        $.each(errors, function(i, error) {
                            var item = i.split('.');

                            $('.grp-'+item[0]+'_'+item[1]).addClass('has-error');
                            $('#err-'+item[0]+'_'+item[1]).html(error);
                        });
                    }
                    
                }
            });
        }
    });

    // post school schedule
    $(document).on('click', '.btnSubmitSchoolForm', function() {
        // var chk = 
        if (confirm('Post School Schedule?')) {
            var all_costs = $('.school_costs');
            var all_items = $('.school_items');
            var all_quantity = $('.school_quantity');
            var costs = [];
            var items = [];
            var quantity = [];

            // create costs array
            $.each(all_costs, function(i, e) {
                costs.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })

            // create items array
            $.each(all_items, function(i, e) {
                items.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })

            // create quantity array
            $.each(all_quantity, function(i, e) {
                quantity.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })
            
            var data = {
                'school_application': $('.school_application').map(function(){ return $(this).val(); }).get(),
                'school_supplier': $('.school_supplier').map(function(){ return $(this).val(); }).get(),
                'school_invoice': $('.school_invoice').map(function(){ return $(this).val(); }).get(),
                'school_contact': $('.school_contact').map(function(){ return $(this).val(); }).get(),

                'school_items': items,
                'school_costs': costs,
                'school_quantity': quantity,
            }
            console.log(data)
            
            $.ajax({
                type: 'POST',
                url: "{{route('schoolschedulepost')}}",
                data: data,
                success: function(response) {
                    // console.log(response)
                    success(response.msg)
                    var url = "{{url('/admin/schedule/view')}}/"+ response.id;
                    $('#school').html('<p class="text-success"><strong><i class="fas fa-clipboard-check"></i> '+response.msg+'</strong></p><a href="'+ url +'" target="_blank" class="btn btn-success btn-xs"><i class="fas fa-external-link-alt"></i> view schedule</a>');
                },
                error: function(response) {
                    // console.log(response)
                    failure('Process failed!')
                    $('#err-school').html(response.responseJSON.msg)

                    var errors = response.responseJSON.errors;
                    
                    //** use the items and costs arrays above to do the error feedback **

                    // console.log(errors)
                    if (errors) {
                        $.each(errors, function(i, error) {
                            var item = i.split('.');

                            $('.grp-'+item[0]+'_'+item[1]).addClass('has-error');
                            $('#err-'+item[0]+'_'+item[1]).html(error);
                        });
                    }
                    
                }
            });
        }
    });

    // post household schedule
    $(document).on('click', '.btnSubmitHouseholdForm', function() {
        // var chk = 
        if (confirm('Post Household Schedule?')) {
            var all_costs = $('.household_costs');
            var all_items = $('.household_items');
            var costs = [];
            var items = [];

            // create costs array
            $.each(all_costs, function(i, e) {
                costs.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })

            // create items array
            $.each(all_items, function(i, e) {
                items.push({
                    key: $(this).attr('key'),
                    num: $(this).attr('num'),
                    value: $(this).val()
                });
            })
            
            var data = {
                'household_application': $('.household_application').map(function(){ return $(this).val(); }).get(),
                'household_supplier': $('.household_supplier').map(function(){ return $(this).val(); }).get(),
                'household_invoice': $('.household_invoice').map(function(){ return $(this).val(); }).get(),
                'household_contact': $('.household_contact').map(function(){ return $(this).val(); }).get(),

                'household_items': items,
                'household_costs': costs,
            }
            // console.log(data)
            
            $.ajax({
                type: 'POST',
                url: "{{route('householdschedulepost')}}",
                data: data,
                success: function(response) {
                    // console.log(response)
                    success(response.msg)
                    var url = "{{url('/admin/schedule/view')}}/"+ response.id;
                    $('#household').html('<p class="text-success"><strong><i class="fas fa-clipboard-check"></i> '+response.msg+'</strong></p><a href="'+ url +'" target="_blank" class="btn btn-success btn-xs"><i class="fas fa-external-link-alt"></i> view schedule</a>');
                },
                error: function(response) {
                    // console.log(response)
                    failure('Process failed!')
                    $('#err-household').html(response.responseJSON.msg)

                    var errors = response.responseJSON.errors;
                    
                    //** use the items and costs arrays above to do the error feedback **

                    // console.log(errors)
                    if (errors) {
                        $.each(errors, function(i, error) {
                            var item = i.split('.');

                            $('.grp-'+item[0]+'_'+item[1]).addClass('has-error');
                            $('#err-'+item[0]+'_'+item[1]).html(error);
                        });
                    }
                    
                }
            });
        }
    });

    // post rental schedule
    $(document).on('click', '.btnSubmitRentalForm', function() {
        // var chk = 
        if (confirm('Post Rental Schedule?')) {
            
            var data = {
                'rental_application': $('.rental_application').map(function(){ return $(this).val(); }).get(),
                'rental_invoice': $('.rental_invoice').map(function(){ return $(this).val(); }).get(),
            }
            // console.log(data)
            
            $.ajax({
                type: 'POST',
                url: "{{route('rentalschedulepost')}}",
                data: data,
                success: function(response) {
                    // console.log(response)
                    success(response.msg)
                    var url = "{{url('/admin/schedule/view')}}/"+ response.id;
                    $('#rental').html('<p class="text-success"><strong><i class="fas fa-clipboard-check"></i> '+response.msg+'</strong></p><a href="'+ url +'" target="_blank" class="btn btn-success btn-xs"><i class="fas fa-external-link-alt"></i> view schedule</a>');
                },
                error: function(response) {
                    // console.log(response)
                    failure('Process failed!')
                    $('#err-rental').html(response.responseJSON.msg)

                    var errors = response.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(i, error) {
                            var item = i.split('.');

                            $('.grp-'+item[0]+'_'+item[1]).addClass('has-error');
                            $('#err-'+item[0]+'_'+item[1]).html(error);
                        });
                    }
                    
                }
            });
        }
    });

    // initialize school and clothing item counts
    var grant_items = [];
    grant_items['school'] = [];
    grant_items['clothing'] = [];

    // add school supplies item
    $(document).on('click', '.add_grant_item', function() {
        var key = $(this).attr('key');
        var num = $(this).attr('num');
        var grant = $(this).attr('grant');
        // console.log(num);
        // console.log(grant);

        if (grant_items[grant] !== undefined && grant_items[grant][num] !== undefined) {
            grant_items[grant][num] = ++grant_items[grant][num];
        } else {
            grant_items[grant][num] = 2;
        }
        // console.log(grant_items);

        // add quantity row
        $('#div-'+grant+'_quantity_'+ num).append('<div class="input-group div-'+grant+'_item_'+num+'_row_'+grant_items[grant][num]+'"> <span class="input-group-addon" id="">#'+grant_items[grant][num]+'</span> <input type="number" min="0" step="1" class="form-control '+grant+'_quantity" id="'+grant+'_quantity_'+grant_items[grant][num]+'_{{$key}}" num="'+grant_items[grant][num]+'" key="'+key+'" aria-describedby="" required> </div>');

        // add item row
        $('#div-'+grant+'_item_'+ num).append('<div class="input-group div-'+grant+'_item_'+num+'_row_'+grant_items[grant][num]+'"> <span class="input-group-addon" id="">#'+grant_items[grant][num]+'</span> <input type="text" class="form-control '+grant+'_items" id="'+grant+'_items_{{$key + 1}}_{{$key}}" num="'+grant_items[grant][num]+'" key="'+key+'" aria-describedby="" value="" required> <span class="input-group-btn" title="remove item"> <button class="btn btn-danger remove_grant_item" type="button" num="'+num+'" row="'+grant_items[grant][num]+'" grant="'+grant+'">x</button> </span> </div>');

        // add cost row
        $('#div-'+grant+'_cost_'+ num).append('<div class="input-group div-'+grant+'_item_'+num+'_row_'+grant_items[grant][num]+'"> <span class="input-group-addon" id="">#'+grant_items[grant][num]+'</span> <span class="input-group-addon" id="">$</span> <input type="number" min="0" step="0.01" class="form-control '+grant+'_costs" id="'+grant+'_costs_{{$key + 1}}_{{$key}}" num="'+grant_items[grant][num]+'" key="'+key+'" aria-describedby="" required> </div>');

    });

    // remove grant supplies item
    $(document).on('click', '.remove_grant_item', function() {
        var num = $(this).attr('num');
        var row = $(this).attr('row');
        var grant = $(this).attr('grant');

        $('.div-'+grant+'_item_'+num+'_row_'+row).remove();
    });

    // clear error messgaes
    $(document).on('change', '.form-control, .custom-control-input, .custom-file-input, .declaration_signature', function() {
        var field = $(this).prop('name');
        var id = $(this).prop('id');
        var gender = $(this).attr('gender');
        $('.grp-'+field).removeClass('has-error');
        $('#err-'+field).html('');
        $('.grp-'+id).removeClass('has-error');
        $('#err-'+id).html('');
        $('.grp-'+gender).removeClass('has-error');
        $('#err-'+gender).html('');
    });
        
</script>
@endsection