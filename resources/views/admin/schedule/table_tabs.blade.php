@extends('admin.app')

@section('content')

<section class="content" style="font-size: 15px">
    
    @include('common.errors')

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Rental Assistance</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Household</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Clothing</a></li>
                    <li><a href="#tab_4" data-toggle="tab">School Supplies</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ref No.</th>
                                        <th>Applicant Name</th>
                                        <th>ID Card #</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                        <th>Items</th>
                                        <th>Cost TTD</th>
                                        <th>Supplier</th>
                                        <th>Invoice</th>
                                        <th>Contact#</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_3">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ref No.</th>
                                        <th>Applicant Name</th>
                                        <th>ID Card #</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                        <th>Items</th>
                                        <th>Cost TTD</th>
                                        <th>Supplier</th>
                                        <th>Invoice</th>
                                        <th>Contact#</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_4">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ref No.</th>
                                        <th>Applicant Name</th>
                                        <th>ID Card #</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                        <th>Items</th>
                                        <th>Cost TTD</th>
                                        <th>Supplier</th>
                                        <th>Invoice</th>
                                        <th>Contact#</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>

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

<script>

    
        
</script>
@endsection