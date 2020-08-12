@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                
                <form id="form" method="POST" action="{{route('newschedulepost')}}" role="form">
                    @csrf

                    <input type="hidden" id="categories" name="categories">
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
                                                    <button type="button" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
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
                                        <td><h4>{{$application->reference_number}} - {{$application->applicant->name}}</h4></td>
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
                                                    <button type="button" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
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
<script>
    var applications = [];
    var allApplications = {!! json_encode($applications->pluck('id')->toJson()) !!};

    $('.checkboxRow').on('click', function() {
        var id = $(this).attr('catId');
        if ($('#checkbox'+id).hasClass('far')) {
            $('#checkbox'+id).removeClass('far').addClass('fas');
            applications.push(id);
        } else {
            $('.checkboxAll, #checkbox'+id).addClass('far').removeClass('fas');
            removeValueFromArray(id);          
        }
        $('#categories').val(applications);
        // console.log(applications);
    });
    
    $('.checkboxAllRow').on('click', function() {
        if ($('.checkboxAll').hasClass('far')) {
            $('.checkboxes').removeClass('far').addClass('fas');
            applications = allApplications;
        } else {
            $('.checkboxes').addClass('far').removeClass('fas');
            applications = [];
        }
        $('#categories').val(applications);
        // console.log(applications);
    });

    function removeValueFromArray(val) {
        applications = $.grep(applications, function(value) {
            return value != val;
        });
    }
</script>
@endsection