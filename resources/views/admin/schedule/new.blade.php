@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
@include('common.errors')

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                
                <form id="scheduleForm" method="POST" action="{{route('newschedulepost')}}" role="form">
                    @csrf

                    <input type="hidden" id="applications" name="applications">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>                                    
                                    <tr>
                                        <th class="text-center checkboxAllRow" style="width: 60px; vertical-align: middle;" id="checkboxAllRow">
                                            <h3 style="margin-top: 10px; margin-bottom: 0px;"><i class="far fa-square checkboxes checkboxAll" aria-hidden="true" id="checkboxAll"></i></h3>
                                        </th>
                                        <th>
                                            <h3>
                                                Applications
                                                <small>
                                                    <button type="button" class="btn btn-danger pull-right submitBtn"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
                                                </small>
                                            </h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($applications as $application)
                                        <tr id="tableRow{{$application->id}}" class=" checkboxRow" catId="{{$application->id}}">
                                            <td class="text-center" catId="{{$application->id}}">
                                                <h3 style="margin-top: 10px;"><i class="far fa-square checkboxes" catId="{{$application->id}}" aria-hidden="true" id="checkbox{{$application->id}}"></i></h3>
                                            </td>
                                            <td>
                                                <h4>
                                                    {{$application->reference_number}} - {{$application->applicant->name}}
                                                    
                                                    <button type="button" class="btn btn-danger btn-xs application_view pull-right" data-toggle="modal" data-target="#modalview" application="{{$application->id}}"><i class="fa fa-eye" aria-hidden="true"></i> view</button>
                                                </h4>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                    
                                    <tr>
                                        <th class="text-center checkboxAllRow" style="width: 60px; vertical-align: middle;" id="checkboxAllRow">
                                            <h3 style="margin-top: 10px; margin-bottom: 0px;"><i class="far fa-square checkboxes checkboxAll" aria-hidden="true" id="checkboxAll"></i></h3>
                                        </th>
                                        <th>
                                            <h3>
                                                Applications
                                                <small>
                                                    <button type="button" class="btn btn-danger pull-right submitBtn"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
                                                </small>
                                            </h3>
                                        </th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')

<!-- Application View Modal -->
@include('admin.includes.modalview')

<script>
    var applications = [];
    var allApplications = {!! json_encode($applications->pluck('id')->toJson()) !!};
    
    // submit if checked applications
    $(document).on('click', '.submitBtn', function() {
        if (applications.length > 0) {
            var chk = confirm('Create Schedule?');
            if (chk) $('#scheduleForm').submit();
        }
        // console.log(applications);
    });

    // check/uncheck single row
    $(document).on('click', '.checkboxRow', function(e) {
        if (!$(e.target).closest('.application_view').length) {
            var id = $(this).attr('catId');
            
            if ($('#checkbox'+id).hasClass('far')) {
                $('#checkbox'+id).removeClass('far').addClass('fas');
                applications.push(id);
            } else {
                $('.checkboxAll, #checkbox'+id).addClass('far').removeClass('fas');
                removeValueFromArray(id);          
            }
            $('#applications').val(applications);
            // console.log(applications);
        }
    });
    
    // check/uncheck all rows
    $(document).on('click', '.checkboxAllRow', function() {
        if ($('.checkboxAll').hasClass('far')) {
            $('.checkboxes').removeClass('far').addClass('fas');
            applications = allApplications;
        } else {
            $('.checkboxes').addClass('far').removeClass('fas');
            applications = [];
        }
        $('#applications').val(applications);
        // console.log(applications);
    });

    function removeValueFromArray(val) {
        applications = $.grep(applications, function(value) {
            return value != val;
        });
    }
</script>
@endsection